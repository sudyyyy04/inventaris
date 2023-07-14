<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;

class HomeController extends Controller
{
    public function home()
    {
        return view('/home', ['list_mutasi' => Mutasi::with('barang', 'barang.kategori')->get()]);
    }
}
