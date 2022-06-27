<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Throwable;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $produk = Produk::when($request->keyword, function($query) use ($request){
            $query
            ->where('kode_produk', 'like', "%{$request->keyword}%")
            ->orwhere('nama_produk','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%")
            ->orWhere('satuan','like',"%{$request->keyword}%")
            // ->orWhere('is_stock','like',"%{$request->keyword}%")
            ->orWhereHas('kategoriproduk',function(Builder $kategoriproduk) use ($request){
                $kategoriproduk->where('nama_kategori','like',"%{$request->keyword}%");
            });
        })->orderBy('kode_produk')->paginate($pagination);
        
        return view('produk.produkindex',compact('produk'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        $kategoriproduk = KategoriProduk::all();
        return view('produk.produkcreate',['kategoriproduk'=>$kategoriproduk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
        ]);
        $produk = new Produk();
        $produk->kategori_id = $request->kategori_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->kode_produk = Helper::KodeProdukGenerator();
        $produk->gambar = $request->file('gambar')->store('imagesproduk', 'public');
        $produk->harga = $request->harga;
        $produk->satuan = $request->satuan;

        
        $produk->save();

        Alert::success('Data Produk Berhasil Ditambahkan');
        return redirect()->route('produk.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        return view('produk.produkdetail', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');
        $produk = Produk::find($id);
        $kategoriproduk = KategoriProduk::all();
        return view('produk.produkedit', compact('produk','kategoriproduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
        ]);

        $produk = Produk::where('id', $id)->first();
        $produk->kategori_id = $request->get('kategori_id');
        $produk->nama_produk = $request->get('nama_produk');
        $produk->harga = $request->get('harga');
        //$produk->satuan = $request->get('satuan');

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && file_exists(storage_path('app/public/' . $produk->gambar))) {
                Storage::delete('public/' . $produk->foto);
            }
            $image_name = $request->file('gambar')->store('imagesproduk', 'public');
            $produk->gambar = $image_name;
        }
        $produk->save();

        // produk::find($id)->update($request->all());
        return redirect()->route('produk.index')
            ->with('success', 'Data Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        try{
            Produk::find($id)->delete();
        } catch (Throwable $error){
            report($error);
            return to_route(route: 'produk.index')->with('warning', 
            'Mohon Maaf Data Produk Belum Bisa Dihapus. Coba Lagi Nanti.');
        }
        return to_route(route: 'produk.index')->with('success', 
            'Data Produk Berhasil Dihapus');
    }

    public function cetak_pdf_produk(){
        $produk = Produk::all();
        $tanggal = Carbon::now()->isoFormat('D MMMM YYYY');

        $pdf = PDF::loadview('produk.produkpdf',['produk'=>$produk], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }
}
