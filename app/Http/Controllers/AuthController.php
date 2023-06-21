<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function cek_login(Request $request)
    {
        $password = $request->input('password');
        $nik = $request->input('nik');

        if (Auth::attempt(['nik' => $nik, 'password' => $password])) {
            return redirect()->intended('/home')->with('success', 'Login Berhasil');
        } else {
            return redirect()->intended('/')->with('error', 'NIK atau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
