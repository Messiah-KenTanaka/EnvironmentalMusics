<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class PolicyController extends Controller
{
    public function index()
    {
        $tags = Tag::getPopularTag();

        return view('policy.policy', [
            'tags' => $tags,
        ]);
    }
}
