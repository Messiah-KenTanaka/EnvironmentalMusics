<?php

namespace App\Services;

use App\Article;
use Illuminate\Support\Facades\Http;

class RankingService
{
    // 全国ランキングを取得
    public function getRankingIndex($blockUsers)
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
            ->whereNotNull('image')
            ->whereNotNull('fish_size')
            ->orderByDesc('fish_size')
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();
    }

    // 都道府県ランキングを取得
    public function getPrefRanking($blockUsers, $randomPref)
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
            ->where('pref', $randomPref)
            ->whereNotNull('image')
            ->whereNotNull('fish_size')
            ->orderByDesc('fish_size')
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();
    }

    // フィールドのランキングを取得
    public function getFieldRanking($blockUsers, $randomField)
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
            ->where('bass_field', $randomField)
            ->whereNotNull('image')
            ->whereNotNull('fish_size')
            ->orderByDesc('fish_size')
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();
    }

    // 釣果投稿されている都道府県のリストを取得
    public function getExistingPrefs($blockUsers)
    {
        return Article::select('pref')
            ->distinct()
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers);
            })
            ->where('publish_flag', 1)
            ->whereNotNull('image')
            ->whereNotNull('fish_size')
            ->whereNotNull('pref')
            ->pluck('pref')
            ->toArray();
    }

    // 釣果投稿されているフィールドのリストを取得
    public function getExistingFields($blockUsers)
    {
        return Article::select('bass_field')
            ->distinct()
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers);
            })
            ->where('publish_flag', 1)
            ->whereNotNull('image')
            ->whereNotNull('fish_size')
            ->whereNotNull('bass_field')
            ->pluck('bass_field')
            ->toArray();
    }
}
