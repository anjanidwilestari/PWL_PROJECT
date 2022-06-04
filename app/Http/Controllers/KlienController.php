<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlienController extends Controller
{
    public function home()
    {
        return view('klien.home', ['title' => 'Beranda']);
    }
    public function produk()
    {
        return view('klien.produk', ['title' => '- Produk' ]);
    }
    public function galery()
    {
        return view('klien.galery', ['title' => '- Galeri' ]);
    }
    public function about()
    {
        return view('klien.about', ['title' => '- Tentang Kami']);
    }
    public function contact()
    {
        return view('klien.contact', ['title' => '- Hubungi Kami']);
    }
}
