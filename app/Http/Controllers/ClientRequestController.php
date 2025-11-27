<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Notifications;
use Illuminate\Support\Facades\Session;

class ClientRequestController extends Controller
{
    public function sendRequest(Request $request) {

        $admin = User::where('username', 'admin')->first();
        $credentials = $request->validate([
            'title' => 'required|max:100',
            'desc' => 'required|max:500'
        ]);

        $notifId = '';
        do {
            $notifId = 'RQS-' . now()->format('Ymd') . '-' . Str::upper(Str::random(12));
        } while (Notifications::where('notification_id', $notifId)->exists());

        $uuid = '';
        do{
            $uuid = Str::uuid();
        } while (Notifications::where('uuid', $uuid)->exists());


        Notifications::create([
            'uuid' => $uuid,
            'notification_id' => $notifId,
            'isRead' => false,
            'from' => Session::get('user.id'),
            'to' => $admin->id,
            'title' => $credentials['title'],
            'desc' => $credentials['desc'],
            'isAproved' => 'pending',
        ]);

        return redirect('/client/request');
    }
}
