<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerProses(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required|max:11',
            'email' => 'required|email|ends_with:bprdn.com',
            'password' => 'required|min:8|max:8',

        ]);
        $user['level'] = 'user';
        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);
        event(new Registered($user));
        Auth::login($user);
        return redirect('/email/verify');
    }

}
