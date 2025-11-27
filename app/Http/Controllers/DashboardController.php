<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

class DashboardController extends Controller
{
    public function show() {
    $request = Notifications::where('isAproved', 'pending')->get();

        return view('dashboard.dashboard', ['requests' => $request]);
    }

    public function clientDashboard () {
        return view('client.dashboardClient', ['title' => 'IMS | Dashboard']);
    }
}
