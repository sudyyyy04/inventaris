<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class Status extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'status';
    protected $fillable = [
        'id_kategori',
        'id_lokasi',
        'nama_user',
        'id_divisi',
        'nomor_inventaris',
        'spesifikasi',
        'harga',
        'tanggal_beli',
        'harga_penyusutan',
        'keterangan',
        'created_at',
        'updated_at',

    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
