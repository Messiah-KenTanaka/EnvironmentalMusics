<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Tag;
use App\BlockList;
use App\Services\LikeService;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function index(Article $article)
    {
        $likeUserIds = $article->likes->pluck('id')->toArray();

        $users = $this->likeService->getFollowers($likeUserIds);

        $tags = Tag::getPopularTag();

        return view('likes.index', [
            'users' => $users,
            'tags' => $tags,
        ]);
    }
}
