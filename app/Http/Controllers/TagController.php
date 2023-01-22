<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Functions;

class TagController extends Controller
{
    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first()
            ->load(['articles.user', 'articles.likes', 'articles.tags']);

        return view('tags.show', ['tag' => $tag]);
    }
}