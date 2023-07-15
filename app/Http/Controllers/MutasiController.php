<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function store(Request $request)
    {
        $mutasi = new Mutasi();

        if (Mutasi::where('id_barang', $request->id_barang)->exists()) {
            $barang = Mutasi::where('id_barang', $request->id_barang)->latest()->first();
            $mutasi->lokasi_lama = $barang->lokasi_baru;
            $mutasi->divisi_lama = $barang->divisi_baru;
        } else {
            $barang = Barang::where('id', $request->id_barang)->first();
            $mutasi->lokasi_lama = $barang->id_lokasi;
            $mutasi->divisi_lama = $barang->id_divisi;
        }
        $mutasi->id_barang = $request->id_barang;
        $mutasi->lokasi_baru = $request->id_lokasi;
        $mutasi->divisi_baru = $request->id_divisi;
        $mutasi->save();

        return back()->with('success', 'Mutasi Berhasil');
    }

    public function destroy($id)
    {
        Mutasi::find($id)->delete();
        return redirect('/home')->with('success', 'Data Berhasil Dihapus');
    }

    public function update($id)
    {
        Mutasi::find($id)->update(request()->only('barang', 'dari', 'ke'));
        return redirect('/home')->with('success', 'Data Berhasil Diupdate');
    }
}
