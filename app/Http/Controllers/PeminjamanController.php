<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Member;
use App\Models\Peminjaman;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Throwable;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $peminjaman = Peminjaman::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('kode_peminjaman', 'like', "%{$request->keyword}%")
                ->orWhere('nama_petugas', 'like', "%{$request->keyword}%")
                ->orWhere('jumlah_pinjam', 'like', "%{$request->keyword}%")
                ->orWhere('total_harga', 'like', "%{$request->keyword}%")
                ->orWhere('tgl_pinjam', 'like', "%{$request->keyword}%")
                ->orWhere('harga_satuan', 'like', "%{$request->keyword}%")
                ->orWhere('lama_pinjam', 'like', "%{$request->keyword}%")
                ->orWhere('status', 'like', "%{$request->keyword}%")
                ->orWhereHas('member',function(Builder $member) use ($request){
                    $member->where('nama','like',"%{$request->keyword}%");
                })
                ->orWhereHas('produk',function(Builder $produk) use ($request){
                    $produk->where('nama_produk','like',"%{$request->keyword}%");
                });
        })->orderBy('kode_peminjaman')->paginate($pagination);

        return view('peminjaman.peminjamanindex', compact('peminjaman'))
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
        $member = Member::all();
        $produk = Produk::all();
        return view('peminjaman.peminjamancreate',['member'=>$member], ['produk'=>$produk]);
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
            'member_id' => 'required',
            'produk_id' => 'required',
            'nama_petugas' => 'required',
            'jumlah_pinjam' => 'required',
            'total_harga' => 'required',
            'harga_satuan' => 'required',
            'lama_pinjam' => 'required',
        ]);

        $peminjaman = new Peminjaman;
        $peminjaman->member_id = $request->member_id;
        $peminjaman->produk_id = $request->produk_id;
        $peminjaman->nama_petugas = $request->nama_petugas;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->total_harga = $request->total_harga;
        $peminjaman->tgl_pinjam = Carbon::now();
        $peminjaman->harga_satuan = $request->harga_satuan;
        $peminjaman->lama_pinjam = $request->lama_pinjam;
        $peminjaman->status = 'Dipinjam';
        $peminjaman->kode_peminjaman = Helper::KodePeminjamanGenerator();
        
        $peminjaman->save();
        
        Alert::success('Data Peminjaman Berhasil Ditambahkan');
        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::find($id);
        $member = Member::all();
        $produk = Produk::all();
        return view('peminjaman.peminjamandetail',compact('peminjaman','member', 'produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');
        $member = Member::all();
        $produk = Produk::all();
        $peminjaman = Peminjaman::find($id);

        return view('peminjaman.peminjamanedit',compact('peminjaman','member', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required',
            'produk_id' => 'required',
            'nama_petugas' => 'required',
            'jumlah_pinjam' => 'required',
            'harga_satuan' => 'required',
            'total_harga' => 'required',
            // 'status_bayar' => 'required',
            'status' => 'required',
            'lama_pinjam' => 'required',
        ]);
        $peminjaman = Peminjaman::where('id', $id)->first();
        $peminjaman->member_id = $request->member_id;
        $peminjaman->produk_id = $request->produk_id;
        $peminjaman->nama_petugas = $request->nama_petugas;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->harga_satuan = $request->harga_satuan;
        $peminjaman->total_harga = $request->total_harga;
        $peminjaman->status = $request->status;
        $peminjaman->tgl_pinjam = Carbon::now();
        $peminjaman->lama_pinjam = $request->lama_pinjam;

        $peminjaman->save();

        return redirect()->route('peminjaman.index')
        ->with('success', 'Data Peminjaman Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        try{
            Peminjaman::find($id)->delete();
        }catch(Throwable $error){
            report($error);
            return to_route(route: 'peminjaman.index')->with('warning', 
            'Mohon Maaf Data Peminjaman Belum Bisa Dihapus. Coba Lagi Nanti.');
        }
        return redirect()->route('peminjaman.index')
            -> with('success', 'Data Peminjaman Berhasil Dihapus');
    }

    public function cetak_pdf_peminjaman(){
        $peminjaman = Peminjaman::all();
        $tanggal = Carbon::now()->isoFormat('D MMMM YYYY');

        $pdf = PDF::loadview('peminjaman.peminjamanpdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function cetaknota($id){
        $peminjaman = new Peminjaman;
        $peminjaman = $peminjaman->find($id);
        $tanggal = Carbon::now()->isoFormat('D MMMM YYYY');

        $pdf = PDF::loadview('peminjaman.notapdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream($id);
    }

    public function getHarga($id){
        $loadData = Produk::find($id);
        return response()->json($loadData);
    }
    
    public function belumkembali(){
        $pagination = 5;
        $peminjaman = Peminjaman::with('member','produk')
        ->where('status', 'like', 'Dipinjam') 
        ->orderBy('kode_peminjaman')
        ->paginate($pagination);

        return view('transaksi.belumkembali', compact('peminjaman'))
            ->with('i', (request()->input('page', 1) - 1) * $pagination);
    }

    public function dikembalikan(){
        $pagination = 5;
        $peminjaman = Peminjaman::with('member','produk')
        ->where('status', 'like', 'Dikembalikan') 
        ->orderBy('kode_peminjaman')
        ->paginate($pagination);

        return view('transaksi.dikembalikan', compact('peminjaman'))
            ->with('i', (request()->input('page', 1) - 1) * $pagination);
    }

    public function cetak_pdf_dikembalikan(){
        $peminjaman = Peminjaman::all()
        ->where('status', 'like', 'Dikembalikan');
        $tanggal = Carbon::now()->isoFormat('D MMMM YYYY');

        $pdf = PDF::loadview('transaksi.dikembalikanpdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function cetak_pdf_belumkembali(){
        $peminjaman = Peminjaman::all()
        ->where('status', 'like', 'Dipinjam');
        $tanggal = Carbon::now()->isoFormat('D MMMM YYYY');

        $pdf = PDF::loadview('transaksi.belumkembalipdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }
}
