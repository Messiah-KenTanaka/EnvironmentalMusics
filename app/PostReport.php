<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostReport extends Model
{
    protected $table = 'post_reports';

    protected $fillable = [
        'article_id',
        'article_user_id',
        'user_id',
        'message',
        'report_reason',
    ];
}
