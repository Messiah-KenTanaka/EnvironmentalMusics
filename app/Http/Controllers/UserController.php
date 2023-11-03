<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Tag;
use App\BlockList;
use App\Notification;
use App\PostReport;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Functions;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show(string $name, $notificationId = null)
    {
        // ログインユーザーのIDを取得
        $userId = auth()->id();

        // 通知を既読にする
        if ($notificationId) {
            $notification = Notification::find($notificationId);
            $notification->read = true;
            $notification->save();
        }

        // ユーザーが凍結されていればリダイレクト処理を実装予定
        // if ($article->publish_flag == 0) {
        //     return redirect()->back()->with('success', '選択したユーザーはアカウント凍結されており表示できません。');
        // }

        // ユーザー情報を取得
        $user = $this->userService->getUser($name);

        $isFollowing = $user->followings->contains($userId);

        // ユーザーの記事情報を取得
        $articles = $this->userService->getUserArticle($user);

        // ユーザーのレコードサイズ取得
        $record['size'] = $this->userService->getUseRecordSize($user);

        // ユーザーのレコードウェイト取得
        $record['weight'] = $this->userService->getUserRecordWeight($user);

        $tags = Tag::getPopularTag();

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'tags' => $tags,
            'record' => $record,
            'isFollowing' => $isFollowing
        ]);
    }

    public function edit(string $name)
    {
        $user = User::getUserName($name);

        $tags = Tag::getPopularTag();

        return view('users.edit', [
            'user' => $user,
            'tags' => $tags,
        ]);
    }

    public function update(UserRequest $request, User $user, string $name)
    {
        $user = User::getUserName($name);
        $user->fill($request->all());
        // s3画像アップロード image
        $file = $request->file('image');
        if (isset($file) && !empty($file->getPathname())) {
            // S3に画像を保存する
            $file = Functions::ImageUploadResize($file);
            $path = Storage::disk('s3')->putFile('bcommunity_img', $file, 'public');
            $user->image = Storage::disk('s3')->url($path);
        }
        // s3画像アップロード background_image
        $file2 = $request->file('background_image');
        if (isset($file2) && !empty($file2->getPathname())) {
            // S3に背景画像を保存する
            $file2 = Functions::ImageUploadResize($file2);
            $path2 = Storage::disk('s3')->putFile('bcommunity_img', $file2, 'public');
            $user->background_image = Storage::disk('s3')->url($path2);
        }

        $user->save();

        return redirect()->route('articles.index')
            ->with('success', 'ユーザー情報を更新しました。');
    }

    public function likes(string $name)
    {
        // ログインユーザーのIDを取得
        $userId = auth()->id();

        $user = User::getUser($name);

        $isFollowing = $user->followings->contains($userId);

        // ユーザーのいいねを取得
        $articles = $this->userService->getUserLikes($user);

        $record['size'] = $this->userService->getUseRecordSize($user);

        $record['weight'] = $this->userService->getUserRecordWeight($user);

        $tags = Tag::getPopularTag();

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
            'tags' => $tags,
            'record' => $record,
            'isFollowing' => $isFollowing
        ]);
    }

    public function conquest(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load(['likes' => function ($query) {
                $query->with('user', 'likes', 'tags', 'retweets')
                    ->withCount(['article_comments as comment_count' => function ($query) {
                        $query->where('publish_flag', 1);
                    }]);
            }]);

        // ログインユーザーのIDを取得
        $userId = auth()->id();

        // フォローされているか
        $userId = auth()->id();
        $isFollowing = $user->followings->contains($userId);

        $record['size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');

        $record['weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');

        $tags = Tag::getPopularTag();

        return view('users.conquest', [
            'user' => $user,
            'tags' => $tags,
            'record' => $record,
            'isFollowing' => $isFollowing
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followings.followers');

        // ログインユーザーのIDを取得
        $userId = auth()->id();

        // フォローされているか
        $userId = auth()->id();
        $isFollowing = $user->followings->contains($userId);

        $followings = $user->followings
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $record['size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');

        $record['weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');

        $tags = Tag::getPopularTag();

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
            'tags' => $tags,
            'record' => $record,
            'isFollowing' => $isFollowing
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followers.followers');

        // ログインユーザーのIDを取得
        $userId = auth()->id();

        // フォローされているか
        $userId = auth()->id();
        $isFollowing = $user->followings->contains($userId);

        $followers = $user->followers
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $record['size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');

        $record['weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');

        $tags = Tag::getPopularTag();

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
            'tags' => $tags,
            'record' => $record,
            'isFollowing' => $isFollowing
        ]);
    }

    public function block(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followings.followers');

        // ログインユーザーのIDを取得
        $userId = auth()->id();

        // フォローされているか
        $userId = auth()->id();
        $isFollowing = $user->followings->contains($userId);

        $blockList = $user->blockList
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $record['size'] = $user->articles
            ->whereNotNull('fish_size')
            ->where('publish_flag', 1)
            ->max('fish_size');

        $record['weight'] = $user->articles
            ->whereNotNull('weight')
            ->where('publish_flag', 1)
            ->max('weight');

        $tags = Tag::getPopularTag();

        return view('users.block', [
            'user' => $user,
            'blockList' => $blockList,
            'tags' => $tags,
            'record' => $record,
            'isFollowing' => $isFollowing
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        // 通知を作成
        Notification::create([
            'sender_id' => $request->user()->id,
            'receiver_id' => $user->id,
            'type' => 'follow',
            'read' => false,  // 未読
        ]);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

    // ユーザーブロック機能
    public function userBlock(Request $request, int $userId)
    {
        $blockedUserId = $request->input('article_user_id');

        //すでにブロック済みか確認
        $isBlocked = BlockList::where('user_id', $userId)
            ->where('blocked_user_id', $blockedUserId)
            ->exists();

        if ($isBlocked) {
            return redirect()->route('articles.index')
                ->with('error', 'このユーザーはすでにブロックされています。');
        }

        // ブロックリストにレコードを挿入
        BlockList::create([
            'user_id' => $userId,
            'blocked_user_id' => $blockedUserId
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'ユーザーをブロックしました。');
    }

    public function searchUsers(Request $request)
    {
        $user_name = $request->input('nickname');

        $users = User::with('followers')
            ->where('publish_flag', 1)
            ->when(!is_null($user_name), function ($query) use ($user_name) {
                return $query->where('nickname', 'like', '%' . $user_name . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $tags = Tag::getPopularTag();

        return view('users.search_users', [
            'users' => $users,
            'tags' => $tags,
            'searched_name' => $user_name,
        ]);
    }

    public function notifications()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        $notifications = Notification::with(['sender', 'article', 'article_comment'])
            ->where('receiver_id', $userId)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $tags = Tag::getPopularTag();

        return view('users.notifications', [
            'notifications' => $notifications,
            'tags' => $tags,
        ]);
    }

    // ユーザー削除確認画面
    public function confirmDeleteUser(int $userId)
    {
        $user = User::find($userId);

        // ログインしているユーザーが自分自身の削除確認画面にしかアクセスできないようにする
        if (Auth::id() !== $user->id) {
            return redirect()->route('articles.index')
                ->with('error', 'アクセスできませんでした。');
        }

        $tags = Tag::getPopularTag();

        return view('users.confirm_delete_user', [
            'user' => $user,
            'tags' => $tags
        ]);
    }

    // ユーザー削除機能
    public function deleteUser(Request $request, int $userId)
    {
        $user = User::find($userId);

        // ユーザーが存在しない場合のハンドリング
        if (!$user) {
            return redirect()->route('articles.index')
                ->with('error', 'ユーザーが存在しません。');
        }

        $request_name = $request->name;
        $request_email = $request->email;
        $request_password = $request->password;

        // パスワードの存在を確認する(googleでユーザー登録した場合はパスワードが存在しない)
        if (!empty($user->password) && !Hash::check($request_password, $user->password)) {
            return redirect()->route('articles.index')
                ->with('error', 'ユーザー情報に誤りがあるため削除できませんでした。');
        }

        // ユーザー名とメールアドレスの確認
        if ($user->name !== $request_name || $user->email !== $request_email) {
            return redirect()->route('articles.index')
                ->with('error', 'ユーザー情報に誤りがあるため削除できませんでした。');
        }

        try {
            DB::transaction(function () use ($userId) {
                /* ユーザーに関わる全てのテーブル情報の削除を実装 */
                // ユーザーの投稿を全て削除(外部キーによりlikes,article_tag,followsテーブルも削除される)
                Article::where('user_id', $userId)->delete();

                // 報告テーブルの情報を削除
                PostReport::where('user_id', $userId)->delete();

                // ブロックリストテーブルの情報を削除
                BlockList::where(function ($query) use ($userId) {
                    $query->where('user_id', $userId)
                        ->orWhere('blocked_user_id', $userId);
                })->delete();

                // ユーザーを削除
                $user = User::find($userId);
                $user->delete();
            });
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('articles.index')
                ->with('error', '削除処理に失敗しました。');
        }

        // ユーザーをログアウト
        Auth::logout();

        return redirect()->route('articles.index')
            ->with('success', 'ユーザーを削除しました。');
    }
}
