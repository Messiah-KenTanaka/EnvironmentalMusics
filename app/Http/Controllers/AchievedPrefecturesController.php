<?php

namespace App\Http\Controllers;

use App\UserPrefectureMap;
use Illuminate\Http\Request;

class AchievedPrefecturesController extends Controller
{
    public function index($user_id)
    {
        $achievedPrefectures = UserPrefectureMap::where('user_id', $user_id)
            ->pluck('prefecture');
    
        return response()->json($achievedPrefectures);
    }
    
}
