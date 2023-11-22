<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Tag;
use Functions;

class RetweetController extends Controller
{
    public function index(Article $article)
    {
        $retweetUserIds = $article->retweets->pluck('id')->toArray();

        // リツイートしたユーザーを取得
        $users = User::getRetweetUsers($retweetUserIds);

        // 各ユーザーに対して称号のパス取得処理を行う
        $users->transform(function ($item) {
            $item->achievementImage = Functions::getAchievementTitle($item->prefecture_count);

            return $item;
        });

        $tags = Tag::getPopularTag();

        return view('retweets.index', [
            'users' => $users,
            'tags' => $tags,
        ]);
    }
}
