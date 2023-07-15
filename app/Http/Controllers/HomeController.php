<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Divisi;
use App\Models\Lokasi;
use App\Models\Mutasi;

class HomeController extends Controller
{
    public function home()
    {
        $lokasi = Lokasi::all();
        $list_mutasi = Mutasi::with('barang', 'barang.kategori')->get();
        $divisi = Divisi::all();
        $barang = Barang::all();

        return view('/home', compact('lokasi', 'list_mutasi', 'divisi', 'barang'));
    }
}
