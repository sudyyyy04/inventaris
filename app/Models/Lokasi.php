<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class Lokasi extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'lokasi';
    protected $fillable = [
        'nama_lokasi',
        'nama_user',
        'created_at',
        'updated_at',

    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
