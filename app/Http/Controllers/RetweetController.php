<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Tag;
use App\BlockList;

class RetweetController extends Controller
{
    public function index(Article $article)
    {
        $retweetUserIds = $article->retweets->pluck('id')->toArray();

        $users = User::with('followers')
            ->where('publish_flag', 1)
            ->whereIn('id', $retweetUserIds)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
        
        $tags = Tag::getPopularTag();

        return view('retweets.index', [
            'users' => $users,
            'tags' => $tags,
        ]);
    }

}
