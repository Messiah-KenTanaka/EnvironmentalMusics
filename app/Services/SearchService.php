<?php

namespace App\Services;

use App\Article;
use Illuminate\Support\Facades\Http;

class SearchService
{
    // 検索一覧を取得
    public function getSearchIndex($blockUsers)
    {
        return Article::with(['user', 'likes', 'tags', 'retweets'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }

    // キーワード検索一覧を取得
    public function getKeyWordSearch($blockUsers, $keyword)
    {
        return Article::with(['user', 'likes', 'tags', 'retweets'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->where('body', 'LIKE', '%' . $keyword . '%')
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }
}
