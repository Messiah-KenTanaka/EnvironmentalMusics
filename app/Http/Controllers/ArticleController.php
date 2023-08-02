<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\BlockList;
use App\ArticleComment;
use App\UserPrefectureMap;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Functions;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        $articles = Article::with(['user', 'likes', 'tags'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
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
    
        // S3画像アップロード
        $file = $request->file('image');
        if (isset($file) && !empty($file->getPathname())) {
            // S3に画像を保存する
            $file = Functions::ImageUploadResize($file);
            $path = Storage::disk('s3')->putFile('bcommunity_img', $file, 'public');
            $article->image = Storage::disk('s3')->url($path);
        }
    
        $article->save();
    
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        // 全国制覇MAPテーブルに追加
        if ($request->pref != 'その他' && !empty($request->pref) && !empty($request->image) &&
            (!empty($request->fish_size) || !empty($request->weight)) ) {
            $userPrefectureMap = UserPrefectureMap::firstOrCreate([
                'user_id' => $request->user()->id,
                'prefecture' => $request->pref,
            ]);
        }
    
        return redirect()->route('articles.index')
            ->with('success', '投稿しました。');
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

    public function delete(Article $article)
    {
        $article->publish_flag = 0;
        $article->save();
    
        return redirect()->route('articles.index')
            ->with('success', '投稿を削除しました。');
    }
    
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $comments = $article->article_comments()->with('user')
            ->where('publish_flag', 1)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $article->comment_count = $comments->count();

        $tags = Tag::getPopularTag();

        return view('articles.show', [
            'article' => $article,
            'tags' => $tags,
            'comments' => $comments,
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

    public function comment(Request $request, ArticleComment $article_comment)
    {
        $article_comment->fill($request->all());
    
        $article_comment->save();
    
        return redirect()->route('articles.index')
            ->with('success', 'コメントしました。');
    }
}