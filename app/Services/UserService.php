<?php

namespace App\Services;

use App\User;
use App\Article;
use Illuminate\Support\Facades\Http;

class UserService
{
    // ユーザー情報を取得
    public function getUser($name)
    {
        return User::where('name', $name)->first()
            ->load(['articles' => function ($query) {
                $query->with('user', 'likes', 'tags', 'retweets')
                    ->withCount(['article_comments as comment_count' => function ($query) {
                        $query->where('publish_flag', 1);
                    }]);
            }]);
    }

    // ユーザーの記事情報を取得
    public function getUserArticle($user)
    {
        return $user->articles
            ->where('publish_flag', 1)
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }

    // ユーザーのレコードサイズを取得
    public function getUseRecordSize($user)
    {
        return $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');
    }

    // ユーザーのレコードウェイト取得
    public function getUserRecordWeight($user)
    {
        return $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');
    }
}
