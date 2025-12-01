<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

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
}
