<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Divisi;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Mutasi;
use App\Models\Status;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class BarangController extends Controller
{
    public function index()
    {

        $barang = Barang::join('kategori', 'kategori.id', '=', 'barang.id_kategori')
            ->join('lokasi', 'lokasi.id', '=', 'barang.id_lokasi')
            ->join('divisi', 'divisi.id', '=', 'barang.id_divisi')
            ->latest()
            ->select('barang.*', 'kategori.nama_kategori', 'lokasi.nama_lokasi', 'divisi.nama_divisi')
            ->where('id_status', 1)
            ->get();
        $lokasi = Lokasi::all();
        $kategori = Kategori::all();
        $divisi = Divisi::all();
        $status = Status::all();

        $barang->map(function($item) {
            $item->mutasi = Mutasi::where('id_barang', $item->id)->get();
        });

        return view('admin.master.barang.barang', compact('barang', 'kategori', 'lokasi', 'divisi', 'status'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Barang::create([
            'id_kategori' => $request->id_kategori,
            'id_lokasi' => $request->id_lokasi,
            'nama_user' => $request->nama_user,
            'id_divisi' => $request->id_divisi,
            'nomor_inventaris' => $request->nomor_inventaris,
            'spesifikasi' => $request->spesifikasi,
            'harga' => $request->harga,
            'harga_penyusutan' => $request->harga_penyusutan,
            'tanggal_beli' => $request->tanggal_beli,
            'keterangan' => $request->keterangan,
            'id_status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/barang')->with('success', 'Data Berhasil Disimpan');
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
        $barang = Barang::find($id);

        $barang->id_kategori = $request->id_kategori;
        $barang->nama_user = $request->nama_user;
        $barang->id_lokasi = $request->id_lokasi;
        $barang->id_divisi = $request->id_divisi;
        $barang->id_status = $request->id_status;
        $barang->nomor_inventaris = $request->nomor_inventaris;
        $barang->spesifikasi = $request->spesifikasi;
        $barang->tanggal_beli = $request->tanggal_beli;
        $barang->harga = $request->harga;
        $barang->harga_penyusutan = $request->harga_penyusutan;
        $barang->keterangan = $request->keterangan;

        $barang->updated_at = date('Y-m-d H:i:s');

        $barang->save();

        return redirect('/barang')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {

        $barang = Barang::find($id);

        $barang->delete();

        return redirect('/barang')->with('success', 'Data Berhasil Dihapus');
    }

    public function detail(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang->id_kategori = $request->id_kategori;
        $barang->nama_user = $request->nama_user;
        $barang->id_lokasi = $request->id_lokasi;
        $barang->id_divisi = $request->id_divisi;
        $barang->nomor_inventaris = $request->nomor_inventaris;
        $barang->spesifikasi = $request->spesifikasi;
        $barang->tanggal_beli = $request->tanggal_beli;
        $barang->harga = $request->harga;
        $barang->harga_penyusutan = $request->harga_penyusutan;
        $barang->keterangan = $request->keterangan;

        $barang->updated_at = date('Y-m-d H:i:s');
        $barang->save();

        return redirect('/barang')->with('success', 'Data Berhasil Diubah');
    }
}
