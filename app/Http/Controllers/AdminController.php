<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', ['title' => 'Dashboard']);
    }
    public function tabel()
    {
        return view('tabel', ['title' => 'Contoh Tabel']);
    }
}
