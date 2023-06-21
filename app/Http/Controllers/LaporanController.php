<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {

        $barang = Barang::join('kategori', 'kategori.id', '=', 'barang.id_kategori')
            ->join('lokasi', 'lokasi.id', '=', 'barang.id_lokasi')
            ->select('barang.*', 'kategori.nama_kategori', 'lokasi.nama_lokasi')
            ->latest()
            ->get();

        $lokasi = Lokasi::all();
        $kategori = Kategori::all();

        return view('admin.laporan.laporan', compact('barang', 'kategori', 'lokasi'));

    }

    public function pdf()
    {
        $barang = Barang::join('kategori', 'kategori.id', '=', 'barang.id_kategori')
            ->join('lokasi', 'lokasi.id', '=', 'barang.id_lokasi')
            ->select('barang.*', 'kategori.nama_kategori', 'lokasi.nama_lokasi')
            ->latest()
            ->get();
        $lokasi = Lokasi::all();
        $kategori = Kategori::all();

        // return view('admin.laporan.laporan_pdf', compact('barang', 'kategori', 'lokasi'));

        $pdf = Pdf::loadView('admin.laporan.laporan_pdf', compact('barang', 'kategori', 'lokasi'));
        // return view('admin.laporan.laporan_pdf', compact('barang', 'kategori', 'lokasi'));
        return $pdf->download('laporan inventaris.pdf');
    }
}
