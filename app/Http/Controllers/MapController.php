<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class MapController extends Controller
{
    public function index()
    {
        $tags = Tag::getPopularTag();

        return view('map.index', [
            'tags' => $tags,
        ]);
    }
}
