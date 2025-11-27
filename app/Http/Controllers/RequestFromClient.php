<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class RequestFromClient extends Controller
{
    public function page() {
        $request = Notifications::whereIn('isAproved', ['pending', 'rejected', 'approved'])->get();
        return view('admin.request', ['title' => 'IMS | Request', 'requests' => $request]);
    }

    public function rejectedPage() {
        $rejectedRequest = Notifications::where('isAproved', 'rejected')->get();
        return view('admin.rejectedRequest', ['title' => 'IMS | Request Rejected', 'requests' => $rejectedRequest]);
    }

    public function approvedPage() {
        $approvedRequest = Notifications::where('isAproved', 'approved')->get();
        return view('admin.approvedRequest', ['title' => 'IMS | Request Approved', 'requests' => $approvedRequest]);
    }

    public function pendingPage() {
        $pendingRequest = Notifications::where('isAproved', 'pending')->get();
        return view('admin.pendingRequest', ['title' => 'IMS | Request Pending', 'requests' => $pendingRequest]);
    }

    public function detailRequest(Request $request) {
        $detailRequest = Notifications::where('uuid', $request->uuid)->first();
        return view('admin.detailRequest', ['title' => 'IMS | Detail Request', 'request' => $detailRequest]);
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
        $selectedRequest->update([
            'isAproved' => $request->status
        ]);
        return redirect('/request');
    }


}
