<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uHomeController extends Controller
{
    public function uindex()
    {
        return view('backend.uddoktas.upages.uindex');
    }
}
