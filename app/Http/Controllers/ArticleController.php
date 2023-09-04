<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\BlockList;
use App\ArticleComment;
use App\Notification;
use App\UserPrefectureMap;
use App\Http\Requests\ArticleRequest;
use App\Services\LinkPreviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Functions;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $userId = auth()->id(); // ログインユーザーのIDを取得

        // ブロックリストからブロックしたユーザーのIDを取得
        $blockUsers = BlockList::where('user_id', $userId)->pluck('blocked_user_id');

        $articles = Article::with(['user', 'likes', 'tags'])
            ->withCount(['article_comments as comment_count' => function ($query) {
                $query->where('publish_flag', 1);
            }])
            ->whereHas('user', function ($query) use ($blockUsers) {
                $query->where('publish_flag', 1)
                    ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
            })
            ->where('publish_flag', 1)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $tags = Tag::getPopularTag();

        return view('articles.index',[
            'articles' => $articles, 
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $tags = Tag::getPopularTag();

        $bassField = config('bassField');

        return view('articles.create', [
            'allTagNames' => $allTagNames,
            'tags' => $tags,
            'bassField' => $bassField,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
    
        // S3画像アップロード
        $file = $request->file('image');
        if (isset($file) && !empty($file->getPathname())) {
            // S3に画像を保存する
            $file = Functions::ImageUploadResize($file);
            $path = Storage::disk('s3')->putFile('bcommunity_img', $file, 'public');
            $article->image = Storage::disk('s3')->url($path);
        }
        // S3画像アップロード2
        $file2 = $request->file('image2');
        if (isset($file2) && !empty($file2->getPathname())) {
            // S3に画像を保存する
            $file2 = Functions::ImageUploadResize($file2);
            $path = Storage::disk('s3')->putFile('bcommunity_img', $file2, 'public');
            $article->image2 = Storage::disk('s3')->url($path);
        }
        // S3画像アップロード3
        $file3 = $request->file('image3');
        if (isset($file3) && !empty($file3->getPathname())) {
            // S3に画像を保存する
            $file3 = Functions::ImageUploadResize($file3);
            $path = Storage::disk('s3')->putFile('bcommunity_img', $file3, 'public');
            $article->image3 = Storage::disk('s3')->url($path);
        }
    
        $article->save();
    
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        // 全国制覇MAPテーブルに追加
        if ($request->pref != 'その他' && !empty($request->pref) && !empty($request->image) &&
            (!empty($request->fish_size) || !empty($request->weight)) ) {
            $userPrefectureMap = UserPrefectureMap::firstOrCreate([
                'user_id' => $request->user()->id,
                'prefecture' => $request->pref,
            ]);
        }
    
        return redirect()->route('articles.index')
            ->with('success', '投稿しました。');
    }
    

    public function edit(Article $article)
    {
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $tags = Tag::getPopularTag();

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
            'tags' => $tags,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    public function delete(Article $article)
    {
        $article->publish_flag = 0;
        $article->save();
    
        return redirect()->route('articles.index')
            ->with('success', '投稿を削除しました。');
    }
    
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article, $notificationId = null)
    {
        // 通知を既読にする
        if ($notificationId) {
            $notification = Notification::find($notificationId);
            if ($notification && $notification->receiver_id == auth()->id()) {
                // 特定の記事に関連するすべての通知を取得
                $relatedNotifications = Notification::where('article_id', $notification->article_id)
                    ->where('receiver_id', auth()->id())
                    ->get();
                    
                // すべての関連通知を既読に更新
                foreach ($relatedNotifications as $relatedNotification) {
                    $relatedNotification->read = true;
                    $relatedNotification->save();
                }
            }
        }

        // 記事が削除されていればリダイレクト
        if ($article->publish_flag == 0) {
            return redirect()->back()->with('success', '選択した投稿は削除されており表示できません。');
        }

        $comments = $article->article_comments()->with('user')
            ->where('publish_flag', 1)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $article->comment_count = $comments->count();

        $tags = Tag::getPopularTag();

        return view('articles.show', [
            'article' => $article,
            'tags' => $tags,
            // 'comments' => $comments,
        ]);
    }

    public function getComments($article_id)
    {
        $article = Article::findOrFail($article_id);

        $comments = $article->article_comments()->with('user')
            ->where('publish_flag', 1)
            ->orderByDesc('created_at')
            ->limit(50)
            ->get();

        return response()->json($comments);
    }

    public function markAllAsRead()
    {
        // 特定のユーザーの全ての未読通知を取得
        $unreadNotifications = Notification::where('receiver_id', auth()->id())
            ->where('read', false)
            ->get();
    
        // すべての未読通知を既読に更新
        foreach ($unreadNotifications as $unreadNotification) {
            $unreadNotification->read = true;
            $unreadNotification->save();
        }
    
        return redirect()->back()->with('success', '全ての通知を既読にしました。');
    }    

    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function comment(Request $request, ArticleComment $article_comment)
    {
        $article_comment->fill($request->all());
    
        $article_comment->save();
    
        return redirect()->route('articles.index')
            ->with('success', 'コメントしました。');
    }
}