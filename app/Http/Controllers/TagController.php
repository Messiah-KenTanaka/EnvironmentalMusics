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
            ->load([
                'articles' => function ($query) {
                    $query->whereHas('user', function ($query) {
                        $query->where('publish_flag', 1);
                    })
                    ->with('user', 'likes', 'tags')
                    ->orderByDesc('created_at');
                }
            ]);

        $articles = $tag->articles
            ->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('tags.show',[
            'tag' => $tag,
            'articles' =>$articles,
            'tags' => $tags,
        ]);
    }
}