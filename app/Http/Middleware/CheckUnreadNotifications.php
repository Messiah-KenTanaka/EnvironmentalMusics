<?php

namespace App\Http\Middleware;

use Closure;
use App\Notification;

class CheckUnreadNotifications
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $userId = auth()->id();
            $unreadNotificationsCount = Notification::where('receiver_id', $userId)
                ->where('read', false)
                ->count();
            
            // 99以上の数字は表示しないようにする
            if ($unreadNotificationsCount > 99) {
                $unreadNotificationsCount = 99;
            }

            view()->share('unreadNotificationsCount', $unreadNotificationsCount);
        }

        return $next($request);
    }
}
