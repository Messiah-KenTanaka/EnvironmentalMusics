<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';

    protected $fillable = [
        'id',
        'follower_id',
        'followee_id',
        'created_at',
        'updated_at',
    ];

    public static function getFollow($userId)
    {
        return Follow::where('followee_id', $userId)
            ->inRandomOrder()
            ->limit(100)
            ->pluck('follower_id');
    }
}
