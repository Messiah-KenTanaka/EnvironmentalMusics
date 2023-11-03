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

        // タグを取得
        $tag = Tag::getTag($name, $blockUsers);

        $articles = $tag->articles
            ->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('tags.show', [
            'tag' => $tag,
            'articles' => $articles,
            'tags' => $tags,
        ]);
    }
}
