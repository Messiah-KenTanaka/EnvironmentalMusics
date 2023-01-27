<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class RankingController extends Controller
{
    public function index()
    {
        $ranking = Article::with(['user', 'likes', 'tags'])
            ->whereNotNull('image')
            ->whereNotNull('fish_size')
            ->orderByDesc('fish_size')
            ->limit(30)
            ->get(); 

            $tags = Tag::getPopularTag();

        return view('ranking.index', [
            'ranking' => $ranking,
            'tags' => $tags,
        ]
    );
    }
}
