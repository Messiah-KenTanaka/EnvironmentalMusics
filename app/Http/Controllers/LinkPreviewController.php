<?php

namespace App\Http\Controllers;

use App\Services\LinkPreviewService;
use Illuminate\Http\Request;

class LinkPreviewController extends Controller
{
    public function getLinkPreview(LinkPreviewService $linkPreviewService, Request $request) 
    {
        // リンクプレビュー情報取得
        try {
            $encodedUrl = $request->input('encodedUrl');
            $url = urldecode($encodedUrl);
            $previewData = $linkPreviewService->getPreview($url);

            return response()->json([
                'status' => 1,
                'data' => $previewData,
            ]);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return response()->json([
                'error_flag' => 1,
                'message' => 'リンクプレビューを取得の取得に失敗しました。',
            ]);
        }
    }
}