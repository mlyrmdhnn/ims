<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

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
}
