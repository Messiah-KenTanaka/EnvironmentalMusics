<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Retweet extends Model
{
    protected $table = 'retweets';

    protected $fillable = [
        'id',
        'user_id',
        'article_id',
        'created_at',
        'updated_at',
    ];

    public static function getRetweet($followingUsers)
    {
        return self::whereIn('user_id', $followingUsers)
            ->where('created_at', '>=', Carbon::now()->subDays(1))
            ->groupBy('article_id')
            ->select('article_id', DB::raw('MAX(created_at) as last_retweet'))
            ->orderBy('last_retweet', 'desc')
            ->take(100)
            ->pluck('article_id');
    }
}
