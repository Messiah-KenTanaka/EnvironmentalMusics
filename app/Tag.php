<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function getHashtagAttribute(): string
    {
        return '#' . $this->name;
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany('App\Article')->withTimestamps();
    }

    // タグを取得
    public static function getTag($name, $blockUsers)
    {
        return self::where('name', $name)
            ->with(['articles' => function ($query) use ($blockUsers) {
                $query->whereHas('user', function ($query) use ($blockUsers) {
                    $query->where('publish_flag', 1)
                        ->whereNotIn('user_id', $blockUsers); // ブロックしたユーザーを除外
                })
                    ->with(['user', 'likes', 'tags', 'retweets'])
                    ->withCount(['article_comments as comment_count' => function ($query) {
                        $query->where('publish_flag', 1);
                    }])
                    ->where('publish_flag', 1)
                    ->orderByDesc('created_at');
            }])
            ->first();
    }

    // 人気のタグを取得
    public static function getPopularTag()
    {
        return self::join('article_tag', 'tags.id', '=', 'tag_id')
            ->select('tags.name', 'article_tag.tag_id')
            ->selectRaw('COUNT(article_tag.tag_id)')
            ->groupBy('article_tag.tag_id', 'tags.name')
            ->orderByDesc(DB::raw('COUNT(article_tag.tag_id)'))
            ->limit(20)
            ->get();
    }
}
