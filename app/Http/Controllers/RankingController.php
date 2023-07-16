<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\BlockList;

class RankingController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        // 全国ランキング
        $ranking = Article::with(['user', 'likes', 'tags'])
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
            ->limit(50)
            ->get();

            $tags = Tag::getPopularTag();

        return view('ranking.index', [
            'ranking' => $ranking,
            'tags' => $tags,
        ]);
    }

    public function nationwideWeight()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        // 全国ランキング
        $ranking = Article::with(['user', 'likes', 'tags'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->whereNotNull('image')
            ->whereNotNull('weight')
            ->orderByDesc('weight')
            ->orderByDesc('created_at')
            ->limit(50)
            ->get();

            $tags = Tag::getPopularTag();

        return view('ranking.nationwideWeight', [
            'ranking' => $ranking,
            'tags' => $tags,
        ]);
    }

    public function show(string $pref)
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        // 都道府県ランキング
        $ranking = Article::with(['user', 'likes', 'tags'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->where('pref', $pref)
            ->whereNotNull('image')
            ->whereNotNull('fish_size')
            ->orderByDesc('fish_size')
            ->orderByDesc('created_at')
            ->limit(30)
            ->get(); 

            $tags = Tag::getPopularTag();

        return view('ranking.show', [
            'ranking' => $ranking,
            'tags' => $tags,
            'pref' => $pref,
        ]);
    }

    public function prefWeight(string $pref)
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        // 都道府県ランキング
        $ranking = Article::with(['user', 'likes', 'tags'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->where('pref', $pref)
            ->whereNotNull('image')
            ->whereNotNull('weight')
            ->orderByDesc('weight')
            ->orderByDesc('created_at')
            ->limit(30)
            ->get(); 

            $tags = Tag::getPopularTag();

        return view('ranking.prefWeight', [
            'ranking' => $ranking,
            'tags' => $tags,
            'pref' => $pref,
        ]);
    }

    public function field(string $field)
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        // フィールドランキング
        $ranking = Article::with(['user', 'likes', 'tags'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->where('bass_field', $field)
            ->whereNotNull('image')
            ->whereNotNull('fish_size')
            ->orderByDesc('fish_size')
            ->orderByDesc('created_at')
            ->limit(30)
            ->get(); 

            $tags = Tag::getPopularTag();

        return view('ranking.field', [
            'ranking' => $ranking,
            'tags' => $tags,
            'field' => $field,
        ]);
    }

    public function fieldWeight(string $field)
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        // フィールドランキング
        $ranking = Article::with(['user', 'likes', 'tags'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->where('bass_field', $field)
            ->whereNotNull('image')
            ->whereNotNull('weight')
            ->orderByDesc('weight')
            ->orderByDesc('created_at')
            ->limit(30)
            ->get(); 

            $tags = Tag::getPopularTag();

        return view('ranking.fieldWeight', [
            'ranking' => $ranking,
            'tags' => $tags,
            'field' => $field,
        ]);
    }
}
