<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlienController extends Controller
{
    public function home()
    {
        return view('klien.home', ['title' => 'Home']);
    }
}
