<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class Divisi extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'divisi';
    protected $fillable = [
        'nama_divisi',
        'nama_user',
        'created_at',
        'updated_at',

    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
