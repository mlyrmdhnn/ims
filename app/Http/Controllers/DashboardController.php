<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

class DashboardController extends Controller
{
    public function show() {
    $request = Notifications::where('isAproved', 'pending')->latest()->get();

        return view('dashboard.dashboard', ['requests' => $request, 'title' => 'IMS | Dashboard']);
    }

    public function clientDashboard () {
        return view('client.dashboardClient', ['title' => 'IMS | Dashboard']);
    }
}
