<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\BlockList;

class SearchController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        // 検索結果を取得するクエリを作成する
        $articles = Article::with(['user', 'likes', 'tags', 'retweets'])
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

        $tags = Tag::getPopularTag();
        // dd($tags);

        return view('search.index', [
            'articles' => $articles,
            'tags' => $tags,
        ]);
    }

    public function show(Request $request)
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        $keyword = $request->input('keyword');
        // 検索結果を取得するクエリを作成する
        $articles = Article::with(['user', 'likes', 'tags', 'retweets'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->where('body', 'LIKE', '%'.$keyword.'%')
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $tags = Tag::getPopularTag();

        return view('search.show', [
            'articles' => $articles,
            'tags' => $tags,
            'keyword' => $keyword
        ]);
    }
}
