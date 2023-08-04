<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image',
        'fish_size',
        'pref',
        'bass_field',
        'weight',
        'publish_flag',
        'rod',
        'reel',
        'line',
        'lure',
        'weather',
        'temperature',
        'water_temperature',
        'fishing_type',
        'catch_date',
    ];

    // 釣り方のタイプ
    const FISHING_TYPE_SHORE = 1; // おかっぱり
    const FISHING_TYPE_BOAT = 2;  // ボート


    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function article_comments()
    {
        return $this->hasMany(ArticleComment::class);
    }

}