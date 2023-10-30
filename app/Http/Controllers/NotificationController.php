<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class NotificationController extends Controller
{
    public function markAllAsRead()
    {
        // 特定のユーザーの全ての未読通知を取得
        $unreadNotifications = Notification::getUnreadNotifications();

        // すべての未読通知を既読に更新
        foreach ($unreadNotifications as $unreadNotification) {
            $unreadNotification->read = true;
            $unreadNotification->save();
        }

        return redirect()->back()->with('success', '全ての通知を既読にしました。');
    }
}
