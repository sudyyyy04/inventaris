<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $table = 'mutasi';
    protected $fillable = [
        'barang',
        'dari',
        'ke'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function lokasi_lama()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_lama');
    }

    public function lokasi_baru()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_baru');
    }

    public function divisi_lama()
    {
        return $this->belongsTo(Divisi::class, 'divisi_lama');
    }

    public function divisi_baru()
    {
        return $this->belongsTo(Divisi::class, 'divisi_baru');
    }
}
