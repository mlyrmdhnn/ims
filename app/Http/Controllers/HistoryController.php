<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HistoryController extends Controller
{
    public function clientHistoryRequestPage() {
        $request = Notifications::where('from', Session::get('user.id'))->latest()->get();
        return view('client.historyRequest', ['title' => 'IMS | History', 'requests' => $request]);
    }

    public function clientHistoryTransactionPage() {
        $transaction = Transactions::where('owner_transaction', Session::get('user.id'))->latest()->get();
        return view('client.historyTransaction', ['title' => 'IMS | History Transactions', 'requests' => $transaction]);
    }
}
