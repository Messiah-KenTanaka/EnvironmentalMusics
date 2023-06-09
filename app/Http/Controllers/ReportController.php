<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class ReportController extends Controller
{
    public function index(Request $request, int $userId)
    {
        $report = $request->all();
        $report['user_id'] = $userId;

        $tags = Tag::getPopularTag();

        return view('Reports.Report', [
            'report' => $report,
            'tags' => $tags,
        ]);
    }

    public function storeArticleReport(Request $request)
    {
        // 飛んできたレーポートの内容を確認をDBに保存する処理を実装予定（DB(記事報告テーブル)もまだ作成していない）
        dd($request);

        return redirect()->route('articles.index')->with('success', '報告が送信されました。');
    }
}
