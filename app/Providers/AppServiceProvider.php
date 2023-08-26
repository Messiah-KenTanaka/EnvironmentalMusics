<?php

namespace App\Providers;

use App\ArticleComment;
use App\Notification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }        

        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        
        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage)->values(),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        /**
         * 通知テーブル作成
         *
         * @param ArticleComment $articleComment
         */
        ArticleComment::created(function ($articleComment) {
            // 自分自身の投稿にコメントした場合、通知を作成しない
            if ($articleComment->user_id == $articleComment->article->user_id) {
                return;
            }
            Notification::create([
                'sender_id' => $articleComment->user_id,
                'receiver_id' => $articleComment->article->user_id,
                'article_id' => $articleComment->article_id,
                'article_comment_id' => $articleComment->id,
                'type' => 'comment',
                'read' => false,  // 未読
            ]);
        });
    }
}
