<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\warehouses;
use App\Models\Inventories;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Inventory_units;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function show() {
        $warehouse = warehouses::latest()->get();
        $inventory = Inventories::with(['item', 'warehouse'])->latest()->get();
        $staff = User::where('role', 'staff')->latest()->get();
        return view('dashboard.dashboard', [
            'title' => 'IMS | Dashboard',
            'warehouses' => $warehouse,
            'inventories' => $inventory,
            'staff' => $staff
        ]);
    }

    public function clientDashboard()
    {
        $clientId = Session::get('user.id');
        $threshold = 10;

        // ambil semua item yang dimiliki client (UNIQUE)
        $items = Inventory_units::with(['item.inventories'])
                    ->where('owner_id', $clientId)
                    ->get()
                    ->groupBy('item_id')   // <— kunci utama
                    ->map(function ($group) {
                        return $group->first(); // ambil 1 saja tiap item
                    });



        $totalRequest = Notifications::where('from', Session::get('user.id'))->get();

        $lowStock = 0;

                    foreach($items as $i) {
                        if($i->item->inventories->quantity <= 10) {
                            $lowStock +=1;
                        }
                    }

                    return view('client.dashboardClient', [
                        'title' => 'IMS',
                        'items' => $items,
                        'request' => $totalRequest,
                        'lowStock' => $lowStock
                    ]);

    }

}
