<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notifications;
use Illuminate\Support\Facades\Session;

class NotificationsController extends Controller
{
    public function clientNotifPage() {
        return view('client.notificationPage', ['title' => 'IMS | Notifications']);
    }

    public function setRead($id) {
        // dd($id);
        $notif = Notifications::where('id', $id)->first();
        $notif->update([
            'isRead' => 1
        ]);
    }

    public function inboxAdminPage() {
        $admin = User::where('username' ,'admin')->first();
        $notifAdmin = Notifications::where('to', Session::get('user.id'))
        ->where('notification_id', 'LIKE', 'UPT-%')
        ->latest()
        ->get();
        return view('admin.notifPage', ['title' => 'IMS | Notifications', 'notifAdmin' => $notifAdmin]);
    }

    public function staffInboxPage() {
        return view('staff.inbox', ['title' => 'IMS | Inbox']);
    }
}
