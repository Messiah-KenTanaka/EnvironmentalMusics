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

    // 報告内容取得
    public static function getPostReport()
    {
        return self::orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }
}
