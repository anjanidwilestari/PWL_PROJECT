<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Member;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pengembalian = Pengembalian::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('peminjaman_id', 'like', "%{$request->keyword}%")
                ->orWhere('status_kembali', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%")
                ->orWhere('denda', 'like', "%{$request->keyword}%")
                ->orWhere('created_at','like',"%{$request->keyword}%")
                ->orWhereHas('peminjaman',function(Builder $peminjaman) use ($request){
                    $peminjaman->where('kode_peminjaman','like',"%{$request->keyword}%");
                });
        })->orderBy('id')->paginate($pagination);

        return view('pengembalian.pengembalianindex', compact('pengembalian'))
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
        $peminjaman = Peminjaman::all();
        return view('pengembalian.pengembaliancreate',['peminjaman'=>$peminjaman]);
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
            'peminjaman_id' => 'required',
            'status_kembali' => 'required',
            'created_at' => 'required',
        ]);

        $pengembalian = new Pengembalian;
        $pengembalian->peminjaman_id = $request->peminjaman_id;
        $pengembalian->status_kembali = $request->status_kembali;
        $pengembalian->created_at = $request->created_at;
        $pengembalian->status = 'Dipinjam';
        $pengembalian->kode_peminjaman = Helper::KodePeminjamanGenerator();
        
        $pengembalian->save();
        
        Alert::success('Success','Data Pengembalian Berhasil Ditambahkan');
        return redirect()->route('pengembalian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengembalian = Pengembalian::find($id);
        return view('pengembalian.pengembaliandetail',compact('pengembalian','peminjaman'));
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
            'lama_pinjam' => 'required',
        ]);
        $peminjaman = Peminjaman::where('id', $id)->first();
        $peminjaman->member_id = $request->member_id;
        $peminjaman->produk_id = $request->produk_id;
        $peminjaman->nama_petugas = $request->nama_petugas;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->harga_satuan = $request->harga_satuan;
        $peminjaman->total_harga = $request->total_harga;
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
        Peminjaman::find($id)->delete();
        return redirect()->route('peminjaman.index')
            -> with('success', 'Data Peminjaman Berhasil Dihapus');
    }

    public function cetak_pdf_pengembalian(){
        $peminjaman = Peminjaman::all();
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('peminjaman.peminjamanpdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function cetaknota($id){
        $peminjaman = new Peminjaman;
        $peminjaman = $peminjaman->find($id);
        $tanggal = Carbon::now()->format('d-m-Y');

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
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('transaksi.dikembalikanpdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function cetak_pdf_belumkembali(){
        $peminjaman = Peminjaman::all()
        ->where('status', 'like', 'Dipinjam');
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('transaksi.belumkembalipdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }
}
