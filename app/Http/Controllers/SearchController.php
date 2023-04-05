<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $keyword = $request->input('keyword');
        // 検索結果を取得するクエリを作成する
        $results = Article::with(['user', 'likes', 'tags'])
            ->where('body', 'LIKE', '%'.$keyword.'%')
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('search.show', [
            'results' => $results,
            'tags' => $tags,
            'keyword' => $keyword
        ]);
    }
}
