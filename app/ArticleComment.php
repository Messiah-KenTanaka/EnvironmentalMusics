<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $table = 'article_comments';

    protected $fillable = [
        'comment',
        'user_id',
        'article_id',
        'publish_flag',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
