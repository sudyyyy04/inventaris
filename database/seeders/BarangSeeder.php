<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::insert([[
            "id_kategori" => "1",
            "id_lokasi" => "1",
            "id_status" => "1",
            "nama_user" => "Sudy",
            "id_divisi" => "1",
            "nomor_inventaris" => "001",
            "spesifikasi" => "Gaming",
            "harga" => "5000000",
            "harga_penyusutan" => "10000",
            "tanggal_beli" => "2023-07-11",
            "keterangan" => "Keren"
        ]]);
    }
}
