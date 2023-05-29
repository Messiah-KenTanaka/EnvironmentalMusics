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

        $articles = $user->articles
            ->where('publish_flag', 1)
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $record['size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');

        $record['weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');

        $record['total_size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->sum('fish_size');

        $record['total_weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->sum('weight');


        $tags = Tag::getPopularTag();

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'tags' => $tags,
            'record' => $record
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
        if (isset($file) && !empty($file->getPathname())) {
            // S3に画像を保存する
            $file = Functions::ImageUploadResize($file);
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

        $articles = $user->likes
            ->where('publish_flag', 1)
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $record['size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');

        $record['weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');

        $record['total_size'] = $user->articles
            ->where('publish_flag', 1)
            ->whereNotNull('fish_size')
            ->sum('fish_size');

        $record['total_weight'] = $user->articles
            ->where('publish_flag', 1)
            ->whereNotNull('weight')
            ->sum('weight');

        $tags = Tag::getPopularTag();

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
            'tags' => $tags,
            'record' => $record
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followings.followers');

        $followings = $user->followings
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $record['size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');

        $record['weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');

        $record['total_size'] = $user->articles
            ->where('publish_flag', 1)
            ->whereNotNull('fish_size')
            ->sum('fish_size');

        $record['total_weight'] = $user->articles
            ->where('publish_flag', 1)
            ->whereNotNull('weight')
            ->sum('weight');

        $tags = Tag::getPopularTag();

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
            'tags' => $tags,
            'record' => $record
        ]);
    }
    
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followers.followers');

        $followers = $user->followers
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate'));

        $record['size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');

        $record['weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');

        $record['total_size'] = $user->articles
            ->where('publish_flag', 1)
            ->whereNotNull('fish_size')
            ->sum('fish_size');

        $record['total_weight'] = $user->articles
            ->where('publish_flag', 1)
            ->whereNotNull('weight')
            ->sum('weight');

        $tags = Tag::getPopularTag();

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
            'tags' => $tags,
            'record' => $record
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
