<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Transactions;
use App\Models\Notifications;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {



        View::composer('*', function ($view) {
            $admin = User::where('username', 'admin')->first();
            $view->with('totalNotif', Notifications::where('isAproved', 'pending')->get());
            $view->with('notif', Notifications::where(function($q) {
                $q->where('from', Session::get('user.id'))
                  ->orWhere('to', Session::get('user.id'));
            })
            ->where('isAproved', '!=', 'pending')
            ->paginate(10));
            $view->with('adminNotification', Notifications::where('isAproved', null)->where('to', $admin->id)->where('isRead', 0)->count());

        });
    }
}
