<?php

namespace App\Http\Controllers;

use App\Services\LinkPreviewService;
use Illuminate\Http\Request;

class LinkPreviewController extends Controller
{
    public function getLinkPreview(LinkPreviewService $linkPreviewService, Request $request) 
    {
        $encodedUrl = $request->input('encodedUrl');
        $url = urldecode($encodedUrl);

        $previewData = $linkPreviewService->getPreview($url);

        return response()->json($previewData);
    }
}