<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class KlienController extends Controller
{
    public function home()
    {
        return view('klien.home', ['title' => 'Beranda']);
    }
    public function produk()
    {
        $produk = Produk::paginate(3);

        return view('klien.produk')
            ->with('title', 'Produk')
            ->with('produk', $produk);
        return view('klien.produk', ['title' => 'Produk' ]);
    }
    public function galery()
    {
        return view('klien.galery', ['title' => 'Galeri' ]);
    }
    public function about()
    {
        return view('klien.about', ['title' => 'Tentang Kami']);
    }
    public function contact()
    {
        return view('klien.contact', ['title' => 'Hubungi Kami']);
    }
}
