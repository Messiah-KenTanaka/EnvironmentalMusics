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

    public function show()
    {
        $reportContents = PostReport::orderByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('reports.show', [
            'reportContents' => $reportContents,
            'tags' => $tags,
        ]);
    }
}
