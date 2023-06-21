<?php

namespace App\AuditResolvers;

use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Resolver;

class AuditableTitleResolver implements Resolver
{
    public static function resolve(Auditable $auditable)
    {

        if ($auditable->getTable() === 'barang') {
            return $auditable->nomor_inventaris;
        }
        if ($auditable->getTable() === 'kategori') {
            return $auditable->nama_kategori;
        }

        if ($auditable->getTable() === 'lokasi') {
            return $auditable->nama_lokasi;
        }

        if ($auditable->getTable() === 'users') {
            return $auditable->name;
        }

        return '-';
    }
}
