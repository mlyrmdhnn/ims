<?php

namespace App\Providers;

use App\Models\Notifications;
use App\Models\Transactions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
            $view->with('totalNotif', Notifications::where('isAproved', 'pending')->get());
            $view->with('notif', Notifications::where(function($q) {
                $q->where('from', Session::get('user.id'))
                  ->orWhere('to', Session::get('user.id'));
            })
            ->where('isAproved', '!=', 'pending')
            ->get());
        });
    }
}
