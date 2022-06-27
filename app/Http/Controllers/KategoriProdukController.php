<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\KategoriProduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Throwable;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $kategoriproduk = KategoriProduk::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('id', 'like', "%{$request->keyword}%")
                ->orWhere('nama_kategori', 'like', "%{$request->keyword}%")
                ->orWhere('deskripsi', 'like', "%{$request->keyword}%");
            })->orderBy('id')->paginate($pagination);

            return view('kategoriproduk.kategoriprodukindex', compact('kategoriproduk'))
            ->with('i', (request()->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
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

        Alert::success('Kategori Produk Berhasil Ditambahkan');
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
        $this->authorize('admin');
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

        Alert::success('Kategori Produk Berhasil Diupdate');
        return redirect()->route('kategoriproduk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        try{
            KategoriProduk::find($id)->delete();
        }catch(Throwable $error){
            report($error);
            return to_route(route: 'kategoriproduk.index')->with('warning', 
            'Mohon Maaf Data Kategori Produk Belum Bisa Dihapus. Coba Lagi Nanti.');
        }
        return redirect()->route('kategoriproduk.index')
            -> with('success', 'Kategori Produk Berhasil Dihapus');
    }

    public function cetak_pdf_kategori(){
        $kategoriproduk = KategoriProduk::all();
        $tanggal = Carbon::now()->isoFormat('D MMMM YYYY');

        $pdf = PDF::loadview('kategoriproduk.kategoriprodukpdf',['kategoriproduk'=>$kategoriproduk], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }
}
