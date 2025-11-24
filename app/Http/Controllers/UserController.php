<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function page() {
        return view('auth.login', ['title' => 'IMS Login']);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('error', 'Incorrect username or password');
        }

        $request->session()->put('user', [
            'id' => $user->id,
            'username' => $user->username,
            'name' => $user->name
        ]);

        return redirect('/dashboard');
    }

    public function regist(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|max:20',
            'username' => 'unique:users,username,except,id',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'name' => $credentials['name'],
            'username' => $credentials['username'],
            'role' => $credentials['role'],
            'password' => Hash::make($credentials['password'])
        ]);
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        return redirect('/back-office/login');
    }
}
