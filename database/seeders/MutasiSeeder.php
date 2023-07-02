<?php

namespace Database\Seeders;

use App\Models\Mutasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mutasi::create(['barang' => 'Komputer', 'dari' => 'Nagoya', 'ke' => 'Panbil']);
    }
}
