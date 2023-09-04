<?php

namespace App\Http\Controllers;

use App\ArticleComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Functions;

class ArticleCommentController extends Controller
{
    public function comment(Request $request, ArticleComment $articleComment)
    {
        // コメントした本人かどうかのチェック
        if (Auth::id() !== $request->user_id) {
            return response()->json(['error' => '不正な操作が検出されました。'], 403);
        }

        $articleComment->fill($request->all());
        $articleComment->user_id = Auth::id();
    
        $articleComment->save();
    
        return response()->json(['success' => 'コメントしました。'], 200);
    }

    public function delete(ArticleComment $articleComment)
    {
        // コメントを投稿した本人かどうかのチェック
        if (Auth::id() !== $articleComment->user_id) {
            return response()->json(['error' => '不正な操作が検出されました。'], 403);
        }

        $articleComment->publish_flag = 0;
        $articleComment->save();

        return response()->json(['success' => 'コメントを削除しました。'], 200);
    }
    
}