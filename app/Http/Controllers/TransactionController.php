<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function page() {
        $transactions = Transactions::latest()->get();
        return view('admin.transactionPage', ['title' => 'IMS | Transactions', 'transactions' => $transactions]);
    }

    public function detailTransactionPage($transactionNo)
    {
        $detailTransaction = Transactions::where('transaction_no', $transactionNo)->first();

        return view('reusable.detailTransaction', [
            'title' => 'IMS | Detail Transaction',
            'detailTransaction' => $detailTransaction
        ]);
    }

    public function clientTransaction() {
        $transactions = Transactions::where('owner_transaction', Session('user.id'))->get();
        return view('client.traansactionPage', ['title' => 'IMS | Transaction', 'transactions' => $transactions]);
    }
}
