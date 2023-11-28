<?php

namespace App\Http\Controllers;

use App\PlaceMap;

class PlaceMapController extends Controller
{
    public function index() {
        // 全国のフィールドMAP情報を取得
        try {
            $placeMap = PlaceMap::all();
            return response()->json([
                'status' => 1,
                'data' => $placeMap
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'error_flag' => 1,
                'message' => '全国釣り場情報の取得に失敗しました。'
            ]);
        }
    }
}
