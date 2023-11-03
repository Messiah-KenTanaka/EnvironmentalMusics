<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\BlockList;
use App\Services\SearchService;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::getBlockList($userId);

        // 検索結果を取得するクエリを作成する
        $articles = $this->searchService->getSearchIndex($blockUsers);

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
        $blockUsers = BlockList::getBlockList($userId);

        $keyword = $request->input('keyword');

        // 検索結果を取得するクエリを作成する
        $articles = $this->searchService->getKeyWordSearch($blockUsers, $keyword);

        $tags = Tag::getPopularTag();

        return view('search.show', [
            'articles' => $articles,
            'tags' => $tags,
            'keyword' => $keyword
        ]);
    }
}
