<?php

namespace App\Http\Controllers;

use App\Mail\SendingEmail;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function index()
    {
        Mail::to('aaa@gmail.com')->send(new SendingEmail());
    }
}
