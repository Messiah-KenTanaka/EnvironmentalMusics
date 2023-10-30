<?php

namespace App\Services;

use App\User;

class LikeService
{
    public function __construct()
    {
    }

    // フォロワー取得
    public function getFollowers($likeUserIds)
    {
        return User::with('followers')
            ->where('publish_flag', 1)
            ->whereIn('id', $likeUserIds)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }
}
