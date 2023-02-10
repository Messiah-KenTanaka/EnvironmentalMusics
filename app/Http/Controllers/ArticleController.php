<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use Functions;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $articles = Article::with(['user', 'likes', 'tags'])
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('articles.index',[
            'articles' => $articles, 
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $tags = Tag::getPopularTag();

        $bassField = config('bassField');
        $keyCount = 1;

        return view('articles.create', [
            'allTagNames' => $allTagNames,
            'tags' => $tags,
            'bassField' => $bassField,
            'keyCount' => $keyCount,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        // s3画像アップロード
        $file = $request->file('image');
        if(isset($file)) {
            $path = Storage::disk('s3')->putFile('bcommunity_img', $file, 'public');
            $article->image = Storage::disk('s3')->url($path);    
        }
        $article->save();

        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $tags = Tag::getPopularTag();

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
            'tags' => $tags,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $tags = Tag::getPopularTag();

        return view('articles.show', [
            'article' => $article,
            'tags' => $tags,
        ]);
    }

    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
}