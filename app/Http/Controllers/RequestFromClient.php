<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\warehouses;

class RequestFromClient extends Controller
{
    public function page() {

        $request = Notifications::whereIn('isAproved', ['pending', 'rejected', 'approved'])->paginate(10);
        return view('admin.request', ['title' => 'IMS | Request', 'requests' => $request]);
    }

    public function rejectedPage() {
        $rejectedRequest = Notifications::where('isAproved', 'rejected')->paginate(10);
        return view('admin.rejectedRequest', ['title' => 'IMS | Request Rejected', 'requests' => $rejectedRequest]);
    }

    public function approvedPage() {
        $approvedRequest = Notifications::where('isAproved', 'approved')->paginate(10);
        return view('admin.approvedRequest', ['title' => 'IMS | Request Approved', 'requests' => $approvedRequest]);
    }

    public function pendingPage() {
        $pendingRequest = Notifications::where('isAproved', 'pending')->paginate(10);
        return view('admin.pendingRequest', ['title' => 'IMS | Request Pending', 'requests' => $pendingRequest]);
    }

    public function detailRequest(Request $request) {
        $detailRequest = Notifications::where('uuid', $request->uuid)->first();
        return view('admin.detailRequest', ['title' => 'IMS | Detail Request', 'request' => $detailRequest, ]);
    }


    public function setIsRead(Request $request)
    {
        $notif = Notifications::find($request->id);

        if (!$notif) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $notif->update([
            'isRead' => 1
        ]);

        return response()->json(['message' => 'Success']);
    }

    public function requestDecision(Request $request) {
        $selectedRequest = Notifications::where('id', $request->id)->first();
        $transactionNo = '';
        do{
            $transactionNo = 'TRX-' . now()->format('Ymd') . '-' . Str::upper(Str::random(12));
        } while (Transactions::where('transaction_no', $transactionNo)->exists());

        if($request->status == 'approved') {
            Transactions::create([
                'notif_id' => $selectedRequest->id,
                'transaction_no' => $transactionNo,
                'owner_transaction' => $selectedRequest->from
            ]);
        }



        $selectedRequest->update([
            'isAproved' => $request->status,
            'message' => $request->message
        ]);
        return redirect('/request');
    }


}
