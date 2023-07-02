<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;

class HomeController extends Controller
{
    public function home()
    {
        return view('/home', ['listMutasi' => Mutasi::all()]);
    }
}
