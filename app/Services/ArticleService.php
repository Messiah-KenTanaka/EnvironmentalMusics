<?php

namespace App\Services;

use App\Article;
use Illuminate\Support\Facades\Http;

class ArticleService
{
    public function __construct()
    {
    }

    public function getArticleIndex($blockUsers)
    {
        // 投稿記事一覧を取得
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
}
