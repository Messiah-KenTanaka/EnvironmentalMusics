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

}
