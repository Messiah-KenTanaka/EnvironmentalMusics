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
        $articleComment->fill($request->all());
        $articleComment->user_id = Auth::id();
    
        $articleComment->save();
    
        return redirect()->route('articles.show', ['article' => $request->article_id]);
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