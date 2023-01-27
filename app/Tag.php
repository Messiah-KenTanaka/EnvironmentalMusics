<?php

namespace App;

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
        return self::select('name')
            ->orderByDesc('updated_at')
            ->limit(10)
            ->get();
    }
}