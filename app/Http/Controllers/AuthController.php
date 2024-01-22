<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('authenticate.login');
    }

    public function authenticating(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role_id == 3) {
                return redirect('profile/'.Auth::user()->id);
            } else {
                return redirect('dashboard/'.Auth::user()->id);
            }

        }

        return back()->with('loginError', 'Login failed');
    }

    public function registrasi() {
        return view('authenticate.registrasi', [
            'roles' => Role::latest()->where('name', '!=', 'admin aplikasi')->get(),
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'role_id' => 'required',
            'name' => 'required|max:255',
            'image' => 'image|size:10000',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
            'no_hp' => 'required|min:10|max:15',
            'address' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'Registration successfull!!! Please Login');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
