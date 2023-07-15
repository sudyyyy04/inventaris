<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'nama_status' => 'Aktif',
        ]);
        DB::table('status')->insert([
            'nama_status' => 'Scrub',
        ]);
        DB::table('status')->insert([
            'nama_status' => 'Workshop',
        ]);
    }
}
