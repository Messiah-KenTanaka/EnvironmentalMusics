<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Functions;

class TagController extends Controller
{
    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first()
            ->load(['articles.user', 'articles.likes', 'articles.tags']);

        $articles = $tag->articles
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        // dd($tag);

        $tags = Tag::getPopularTag();

        return view('tags.show',[
            'tag' => $tag,
            'articles' =>$articles,
            'tags' => $tags,
        ]);
    }
}