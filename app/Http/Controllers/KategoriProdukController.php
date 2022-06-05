<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategoriproduk = KategoriProduk::paginate(5);
        $posts = KategoriProduk::orderBy('nama_kategori', 'asc')->paginate(5);
        return view('kategoriproduk.kategoriprodukindex', compact('kategoriproduk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoriproduk.kategoriprodukcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $kategoriproduk = new KategoriProduk();
        $kategoriproduk->nama_kategori = $request->get('nama_kategori');
        $kategoriproduk->deskripsi = $request->get('deskripsi');

        $kategoriproduk->save();

        Alert::success('Success','Data Kategori Produk Berhasil Ditambahkan');
        return redirect()->route('kategoriproduk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoriproduk = KategoriProduk::find($id);
        return view('kategoriproduk.kategoriprodukdetail',compact('kategoriproduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriproduk = KategoriProduk::find($id);
        return view('kategoriproduk.kategoriprodukedit',compact('kategoriproduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $kategoriproduk = KategoriProduk::where('id', $id)->first();
        $kategoriproduk->nama_kategori = $request->get('nama_kategori');
        $kategoriproduk->deskripsi = $request->get('deskripsi');
        
        $kategoriproduk->save();

        return redirect()->route('kategoriproduk.index')
        ->with('success', 'Data Kategori Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriProduk::find($id)->delete();
        return redirect()->route('kategoriproduk.index')
            -> with('success', ' Data Kategori Produk Berhasil Dihapus');
    }
}
