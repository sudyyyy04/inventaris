<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Divisi;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Mutasi;
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
            ->get();
        $lokasi = Lokasi::all();
        $kategori = Kategori::all();
        $divisi = Divisi::all();

        return view('admin.master.barang.barang', compact('barang', 'kategori', 'lokasi', 'divisi'));
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

        if (boolval($request->mutasi)) {
            $mutasi = new Mutasi();

            if (Mutasi::where('id', $id)->exists()) {
                $barang = Mutasi::where('id', $id)->latest()->first();
                $mutasi->lokasi_lama = $barang->lokasi_baru;
                $mutasi->divisi_lama = $barang->divisi_baru;
            } else {
                $mutasi->lokasi_lama = $barang->id_lokasi;
                $mutasi->divisi_lama = $barang->id_divisi;
            }
            $mutasi->id_barang = $id;
            $mutasi->lokasi_baru = $request->id_lokasi;
            $mutasi->divisi_baru = $request->id_divisi;
            $mutasi->save();
            return redirect('/barang')->with('success', 'Mutasi Berhasil');
        }

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
