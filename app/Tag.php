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