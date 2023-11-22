<?php

namespace App\Services;

use App\User;

class LikeService
{
    // フォロワー取得
    public function getFollowers($likeUserIds)
    {
        return User::with('followers', 'user_prefecture_maps')
            ->where('publish_flag', 1)
            ->whereIn('id', $likeUserIds)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }
}
