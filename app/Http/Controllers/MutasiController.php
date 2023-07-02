<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function store(Request $request)
    {
        Mutasi::create($request->only('barang', 'dari', 'ke'));

        return back();
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
