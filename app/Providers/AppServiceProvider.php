<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Notifications;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {


            if (!Auth::check()) {
                return;
            }


            if (!Schema::hasTable('notifications') || !Schema::hasTable('users')) {
                return;
            }

            $user = Auth::user();


            $notif = Notifications::where(function ($q) use ($user) {
                    $q->where('from', $user->id)
                      ->orWhere('to', $user->id);
                })
                ->where('isAproved', '!=', 'pending')
                ->latest()
                ->paginate(10);


            $totalNotif = Notifications::where('isAproved', 'pending')->get();


            $admin = User::where('username', 'admin')->first();

            if ($admin) {
                $adminNotification = Notifications::whereNull('isAproved')
                    ->where('to', $admin->id)
                    ->where('isRead', 0)
                    ->count();
            }


            $view->with([
                'notif' => $notif,
                'totalNotif' => $totalNotif,
                'adminNotification' => $adminNotification,
            ]);
        });
    }
}
