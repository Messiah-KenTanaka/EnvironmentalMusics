<?php

namespace App\Http\Controllers;

use App\Tag;
use App\BlockList;
use Illuminate\Http\Request;
use Functions;

class TagController extends Controller
{
    public function show(string $name)
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');
        
        $tag = Tag::where('name', $name)->first()
            ->load([
                'articles' => function ($query) use ($blockUsers) {
                    $query->whereHas('user', function ($query) use ($blockUsers) {
                        $query->where('publish_flag', 1)
                            ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
                    })
                    ->with('user', 'likes', 'tags')
                    ->where('publish_flag', 1)
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