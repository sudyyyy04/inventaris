<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori');
            $table->integer('id_lokasi');
            $table->integer('id_divisi');
            $table->integer('id_status');
            $table->string('nama_user')->nullable();
            $table->string('nomor_inventaris')->nullable();
            $table->string('spesifikasi')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('harga_penyusutan')->nullable();
            $table->date('tanggal_beli')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
