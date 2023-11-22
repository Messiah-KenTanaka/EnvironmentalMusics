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
        $blockUsers = BlockList::getBlockList($userId);

        // タグを取得
        $tag = Tag::getTag($name, $blockUsers);

        $articles = $tag->articles()
            ->with(['user', 'likes', 'tags', 'retweets', 'user.user_prefecture_maps'])
            ->paginate(config('paginate.paginate'));

        // 各ユーザーに対して称号のパス取得処理を行う
        $articles->transform(function ($item) {
            $item->user->achievementImage = Functions::getAchievementTitle($item->user->prefecture_count);

            return $item;
        });

        $tags = Tag::getPopularTag();

        return view('tags.show', [
            'tag' => $tag,
            'articles' => $articles,
            'tags' => $tags,
        ]);
    }
}
