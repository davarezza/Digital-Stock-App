<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('guest.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'nullable|numeric',
            'password' => 'required|min:3|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('login')->with('success', 'Pendaftaran berhasil. Anda sekarang dapat masuk.');
    }

    public function loginPage()

    {
        return view('guest.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect('/')->with('success', 'Login Berhasil.');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();

        return redirect('/');
    }

}
