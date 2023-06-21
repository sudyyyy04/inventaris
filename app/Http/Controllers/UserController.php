<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('admin.master.user.user', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/user')->with('success', 'Data Berhasil Disimpan');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->nik = $request->nik;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->updated_at = date('Y-m-d H:i:s');

        $user->save();

        return redirect('/user')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id)
    {

        $user = User::find($id);

        $user->delete();

        return redirect('/user')->with('success', 'Data Berhasil Dihapus');

    }
}
