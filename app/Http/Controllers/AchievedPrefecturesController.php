<?php

namespace App\Http\Controllers;

use App\UserPrefectureMap;
use Illuminate\Http\Request;

class AchievedPrefecturesController extends Controller
{
    public function index($user_id)
    {
        try {
            $achievedPrefectures = UserPrefectureMap::where('user_id', $user_id)
            ->pluck('prefecture');

            return response()->json([
                'status' => 1,
                'data' => $achievedPrefectures
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {   
            \Log::error($e->getMessage());
            return response()->json([
                'error_flag' => 1,
                'message' => '都道府県情報の取得に失敗しました。'
            ], 500);
        }
    }
    
}
