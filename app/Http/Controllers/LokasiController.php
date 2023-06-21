<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('admin.master.lokasi.lokasi', compact('lokasi'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/lokasi')->with('success', 'Data Berhasil Disimpan');

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
        $lokasi = Lokasi::find($id);

        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->updated_at = date('Y-m-d H:i:s');

        $lokasi->save();

        return redirect('/lokasi')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id)
    {

        $lokasi = Lokasi::find($id);

        $lokasi->delete();

        return redirect('/lokasi')->with('success', 'Data Berhasil Dihapus');

    }
}
