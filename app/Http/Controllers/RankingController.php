<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\BlockList;
use App\Services\RankingService;

class RankingController extends Controller
{
    protected $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->rankingService = $rankingService;
    }

    public function index()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::getBlockList($userId);

        // 全国ランキング取得
        $ranking = $this->rankingService->getRankingIndex($blockUsers);

        // 1. 存在する都道府県のリストを取得
        $existingPrefs = $this->rankingService->getExistingPrefs($blockUsers);

        // 2. リストからランダムに都道府県を選択
        $randomPref = array_rand(array_flip($existingPrefs), 1);

        // 都道府県ランキング取得
        $prefRanking = $this->rankingService->getPrefRankingIndex($blockUsers, $randomPref);

        // 1. 存在するフィールドのリストを取得
        $existingFields = $this->rankingService->getExistingFields($blockUsers);

        // 2. リストからランダムにフィールドを選択
        $randomField = array_rand(array_flip($existingFields), 1);

        // フィールドランキング取得
        $fieldRanking = $this->rankingService->getFieldRankingIndex($blockUsers, $randomField);

        $tags = Tag::getPopularTag();

        return view('ranking.index', [
            'ranking' => $ranking,
            'prefRanking' => $prefRanking,
            'randomPref' => $randomPref,
            'fieldRanking' => $fieldRanking,
            'randomField' => $randomField,
            'tags' => $tags,
        ]);
    }

    public function nationwide()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::getBlockList($userId);

        // 全国ランキングサイズ一覧取得
        $ranking = $this->rankingService->getNationwideSize($blockUsers);

        $tags = Tag::getPopularTag();

        return view('ranking.nationwide', [
            'ranking' => $ranking,
            'tags' => $tags,
        ]);
    }

    public function nationwideWeight()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::getBlockList($userId);

        // 全国ランキングウェイト
        $ranking = $this->rankingService->getNationwideWeight($blockUsers);

        $tags = Tag::getPopularTag();

        return view('ranking.nationwideWeight', [
            'ranking' => $ranking,
            'tags' => $tags,
        ]);
    }

    public function pref(string $pref)
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::getBlockList($userId);

        // 都道府県ランキングサイズ
        $ranking = $this->rankingService->getPrefSize($blockUsers, $pref);

        $tags = Tag::getPopularTag();

        return view('ranking.pref', [
            'ranking' => $ranking,
            'tags' => $tags,
            'pref' => $pref,
        ]);
    }

    public function prefWeight(string $pref)
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::getBlockList($userId);

        // 都道府県ランキングウェイト
        $ranking = $this->rankingService->getPrefWeight($blockUsers, $pref);

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
        $blockUsers = BlockList::getBlockList($userId);

        // フィールドランキングサイズ
        $ranking = $this->rankingService->getFieldSize($blockUsers, $field);

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
        $blockUsers = BlockList::getBlockList($userId);

        // フィールドランキングウェイト
        $ranking = $this->rankingService->getFieldWeight($blockUsers, $field);

        $tags = Tag::getPopularTag();

        return view('ranking.fieldWeight', [
            'ranking' => $ranking,
            'tags' => $tags,
            'field' => $field,
        ]);
    }
}
