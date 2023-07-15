<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');

class StatusController extends Controller
{

    public function index()
    {
        $status = Status::all();
        return view('admin.master.status.status', compact('status'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        Status::create([
            'nama_status' => $request->nama_status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/status')->with('success', 'Data Berhasil Disimpan');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $status = Status::find($id);

        $status->nama_status = $request->nama_status;
        $status->updated_at = date('Y-m-d H:i:s');

        $status->save();

        return redirect('/status')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id)
    {

        $status = Status::find($id);

        $status->delete();

        return redirect('/status')->with('success', 'Data Berhasil Dihapus');

    }}