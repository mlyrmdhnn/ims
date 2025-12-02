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
            'isClient' => $user->isClient
        ]);

        if($user->isClient) {
            return redirect('/client/dashboard');
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
            return redirect('/back-office/login');
        }

        if($isClient == 1) {
            return redirect('/client/login');
        }
        $request->session()->forget('user');
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

}
