<?php

namespace App\Services;

use App\Article;
use Illuminate\Support\Facades\Http;

class ArticleService
{
    // 投稿記事一覧を取得
    public function getArticleIndex($blockUsers)
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

    // リツイートされた記事を取得
    public function getRetweetArticles($recentRetweets)
    {
        return Article::with(['user', 'likes', 'tags', 'retweets'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereIn('id', $recentRetweets)
            ->where('publish_flag', 1)
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($article) {
                $article->isRetweet = true;
                return $article;
            });
    }

    // コメント取得
    public function getArticleComment($article_id)
    {
        $article = Article::findOrFail($article_id);

        return $article->article_comments()->with('user')
            ->where('publish_flag', 1)
            ->orderByDesc('created_at')
            ->limit(50)
            ->get();
    }
}
