<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Kategori;
use App\Models\User;

date_default_timezone_set('Asia/Jakarta');

class AuditController extends Controller
{
    public function index()
    {
        $auditListPagination = Audit::latest()->paginate(10, ['*'], 'halaman');
        $auditList = $auditListPagination->items();

        foreach ($auditList as $value) {
            if ($value->event == 'updated') {
                $action = 'Mengupdate';
            } elseif ($value->event == 'deleted') {
                $action = 'Menghapus';
            } elseif ($value->event == 'created') {
                $action = 'Membuat';
            }

            $value->description = User::find($value->user_id)->name . ' telah ' . $action . ' data ' . explode('\\', $value->auditable_type)[2];
        }

        return view('admin.auditing.audit', ['auditList' => $auditList], compact('auditListPagination'));

    }

    public function detail($id)
    {
        $audit = Audit::find($id);
        $audit->name = User::find($audit->user_id)->name;
        if (isset($audit->new_values['tanggal_beli'])) {
            $audit->tanggal_beli = now()->createFromDate($audit->new_values['tanggal_beli'])->format('d-m-Y');
        }

        if (array_key_exists('id_kategori', $audit->old_values)) {
            $audit->old_nama_kategori = Kategori::where('id', $audit->old_values['id_kategori'])->value('nama_kategori');
        }
        if (array_key_exists('id_kategori', $audit->new_values)) {
            $audit->new_nama_kategori = Kategori::where('id', $audit->new_values['id_kategori'])->value('nama_kategori');
        }
        return $audit;
    }

}
