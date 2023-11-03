<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Tag;

class RetweetController extends Controller
{
    public function index(Article $article)
    {
        $retweetUserIds = $article->retweets->pluck('id')->toArray();

        // リツイートしたユーザーを取得
        $users = User::getRetweetUsers($retweetUserIds);

        $tags = Tag::getPopularTag();

        return view('retweets.index', [
            'users' => $users,
            'tags' => $tags,
        ]);
    }
}
