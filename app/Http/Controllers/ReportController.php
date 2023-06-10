<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\PostReport;

class ReportController extends Controller
{
    public function index(Request $request, int $userId)
    {
        $report = $request->all();
        $report['user_id'] = $userId;

        $tags = Tag::getPopularTag();

        return view('reports.report', [
            'report' => $report,
            'tags' => $tags,
        ]);
    }

    public function storeArticleReport(Request $request, PostReport $postReport)
    {
        $postReport->fill($request->all());

        $postReport->save();

        return redirect()->route('articles.index')->with('success', '報告が送信されました。');
    }
}
