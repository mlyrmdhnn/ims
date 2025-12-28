<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\warehouses;
use Illuminate\Http\Request;
use function Pest\Laravel\session;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{


    public function clientPage() {
        return view('auth.clientLogin', ['title' => 'IMS Client Login']);
    }

    public function clientRegistPage() {
        return view('auth.clientRegist', ['title' => 'IMS Client Register']);
    }

    public function page() {
        return view('auth.login', ['title' => 'IMS Login']);
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $isClient = (int) $request->isClient;

        $user = User::where('username', $credentials['username'])
                    ->where('isClient', $isClient)
                    ->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('error', 'Incorrect username or password');
        }

        $request->session()->put('user', [
            'id' => $user->id,
            'username' => $user->username,
            'name' => $user->name,
            'isClient' => $user->isClient,
            'role' => $user->role,
            'warehouse_id' => $user->warehouse_id
        ]);


        if($user->isClient) {
            return redirect('/client/dashboard');
        }

        if($user->role == 'staff') {
            return redirect('/staff/items');
        }

        return redirect('/dashboard');
    }

    public function clientRegist (Request $request) {
        $credentials = $request->validate([
            'username' => 'unique:users,username|required',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6|max:12',
            'confirmPassword' => 'required|same:password',
        ]);

        User::create([
            'username' => $credentials['username'],
            'name' => $credentials['name'],
            'phone' => $credentials['phone'],
            'password' => Hash::make($credentials['password']),
            'role' => 'client',
            'isClient' => true
        ]);
        return redirect('/client/login')->with('success', 'Register Successfuly');
    }

    public function logout(Request $request) {
        $isClient = Session::get('user.isClient');
        if($isClient == 0) {
            $request->session()->forget('user');
            return redirect('/back-office/login');
        }

        if($isClient == 1) {
            $request->session()->forget('user');
            return redirect('/client/login');
        }

    }

    public function createUserPage() {
        $warehouses = warehouses::latest()->get();
        return view('admin.createUserPage', ['title' => 'IMS | Create User', 'warehouses' => $warehouses]);
    }

    public function createUser(Request $request) {
        // dd($request);
        $credentials = $request->validate([
            'username' => 'unique:users,username|min:4|max:20',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $credentials['username'],
            'name' => $credentials['name'],
            'role' => $request->role,
            'phone' => $credentials['phone'],
            'warehouse_id' => $request->warehouse,
            'password' => Hash::make($credentials['password'])
        ]);

        return back()->with('success', 'Berhasil membuat staff');

    }

    public function proffilePage(){
        $user = User::where('id', Session::get('user.id'))->first();
        return view('reusable.proffilePage', ['title' => 'IMS | Proffile', 'user' => $user]);
    }

    public function changeProffile(Request $request) {
        $user = User::where('username', $request->username)->first(['id', 'username', 'name', 'phone', 'role']);
        $credentials = $request->validate([
            'name' => 'required|min:4|max:16',
            'phone' => 'required'
        ]);

        $user->update([
            'name' => $credentials['name'],
            'phone' => $credentials['phone']
        ]);

        return back()->with('success', 'Berhasil menyimpan perubahan');
    }

    public function changePassword(Request $request)
    {
        $credentials = $request->validate([
            'currentPassword' => 'required|min:6|max:12',
            'newPassword' => 'required|min:6|max:12'
        ]);

        $user = User::where('id', Session::get('user.id'))->first(['id','password']);

        if (!Hash::check($credentials['currentPassword'], $user->password)) {
            return back()->with('error', 'Wrong password, please check again');
        }

        if ($credentials['currentPassword'] === $credentials['newPassword']) {
            return back()->with('error', 'New password must be different from current password');
        }

        $user->update([
            'password' => Hash::make($credentials['newPassword'])
        ]);

        return back()->with('success', 'Password updated successfully');
    }

    public function allStaffPage() {
        $staff = User::with(['warehouse'])
        ->where('role', 'staff')->latest()->get();
        return view('admin.staff', ['title' => 'IMS | All Staff', 'staff' => $staff]);
    }

    public function deleteStaff(Request $request, $id){
        // dd($id);
        $staff = User::where('id', $id)->first();
        $staff->delete();
        return back()->with('success', 'Staff deleted successfully');
    }


}
