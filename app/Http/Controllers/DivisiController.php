<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class DivisiController extends Controller
{

    public function index()
    {
        $divisi = Divisi::all();
        return view('admin.master.divisi.divisi', compact('divisi'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/divisi')->with('success', 'Data Berhasil Disimpan');

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
        $divisi = Divisi::find($id);

        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->updated_at = date('Y-m-d H:i:s');

        $divisi->save();

        return redirect('/divisi')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id)
    {

        $divisi = Divisi::find($id);

        $divisi->delete();

        return redirect('/divisi')->with('success', 'Data Berhasil Dihapus');

    }}