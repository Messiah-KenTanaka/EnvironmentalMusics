<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class LinkPreviewService 
{
    protected $apiKey;

    public function __construct() 
    {
        $this->apiKey = env('LINKPREVIEW_API_KEY');
    }

    public function getPreview($url) 
    {
        $endpoint = "https://api.linkpreview.net/?key={$this->apiKey}&q={$url}";
        $response = Http::get($endpoint);
        return $response->json();
    }
}
