<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Functions;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load(['articles.user', 'articles.likes', 'articles.tags']);

        $articles = $user->articles->sortByDesc('created_at')->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'tags' => $tags,
        ]);
    }

    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();

        $tags = Tag::getPopularTag();

        return view('users.edit', [
            'user' => $user,
            'tags' => $tags,
        ]);
    }

    public function update(Request $request, User $user, string $name)
    {
        $user = User::where('name', $name)->first();
        $user->fill($request->all());
        // s3画像アップロード
        $file = $request->file('image');
        if(isset($file)) {
            $path = Storage::disk('s3')->putFile('bcommunity_img', $file, 'public');
            $user->image = Storage::disk('s3')->url($path);
        }

        $user->save();

        return redirect()->route('articles.index');
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load(['likes.user', 'likes.likes', 'likes.tags']);

        $articles = $user->likes->sortByDesc('created_at')->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
            'tags' => $tags,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followings.followers');

        $followings = $user->followings->sortByDesc('created_at')->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
            'tags' => $tags,
        ]);
    }
    
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followers.followers');

        $followers = $user->followers->sortByDesc('created_at')->paginate(config('paginate.paginate'));

        $tags = Tag::getPopularTag();

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
            'tags' => $tags,
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }
    
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
