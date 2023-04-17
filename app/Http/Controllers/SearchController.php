<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class SearchController extends Controller
{
    public function index()
    {
        // 検索結果を取得するクエリを作成する
        $articles = Article::with(['user', 'likes', 'tags'])
            ->whereHas('user', function ($query) {
                $query->where('publish_flag', 1);
            })
            ->where('publish_flag', 1)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('search.index', [
            'articles' => $articles,
            'tags' => $tags,
        ]);
    }

    public function show(Request $request)
    {
        $keyword = $request->input('keyword');
        // 検索結果を取得するクエリを作成する
        $articles = Article::with(['user', 'likes', 'tags'])
            ->whereHas('user', function ($query) {
                $query->where('publish_flag', 1);
            })
            ->where('publish_flag', 1)
            ->where('body', 'LIKE', '%'.$keyword.'%')
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('search.show', [
            'articles' => $articles,
            'tags' => $tags,
            'keyword' => $keyword
        ]);
    }
}
