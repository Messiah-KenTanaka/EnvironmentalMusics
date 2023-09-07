<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
