<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Tag;
use App\BlockList;

class LikeController extends Controller
{
    public function index(Article $article)
    {
        $likeUserIds = $article->likes->pluck('id')->toArray();

        $users = User::with('followers')
            ->where('publish_flag', 1)
            ->whereIn('id', $likeUserIds)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
        
        $tags = Tag::getPopularTag();

        return view('likes.index', [
            'users' => $users,
            'tags' => $tags,
        ]);
    }

}
