<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.master.kategori.kategori', compact('kategori'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/kategori')->with('success', 'Data Berhasil Disimpan');

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
        $kategori = Kategori::find($id);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->updated_at = date('Y-m-d H:i:s');

        $kategori->save();

        return redirect('/kategori')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id)
    {

        $kategori = Kategori::find($id);

        $kategori->delete();

        return redirect('/kategori')->with('success', 'Data Berhasil Dihapus');

    }}