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
use PDF;

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
            'tgl_pinjam' => 'required',
            'lama_pinjam' => 'required',
            'status' => 'required',
        ]);

        $peminjaman = new Peminjaman;
        $peminjaman->member_id = $request->member_id;
        $peminjaman->produk_id = $request->produk_id;
        $peminjaman->nama_petugas = $request->get('nama_petugas');
        $peminjaman->jumlah_pinjam = $request->get('jumlah_pinjam');
        $peminjaman->total_harga = $request->get('total_harga');
        $peminjaman->tgl_pinjam = $request->get('tgl_pinjam');
        $peminjaman->lama_pinjam = $request->get('lama_pinjam');
        $peminjaman->status = $request->get('status');
        $peminjaman->kode_peminjaman = Helper::KodePeminjamanGenerator();
        
        $peminjaman->save();
        
        Alert::success('Success','Data Peminjaman Berhasil Ditambahkan');
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
            'total_harga' => 'required',
            'tgl_pinjam' => 'required',
            'lama_pinjam' => 'required',
            'status' => 'required',
        ]);
        $peminjaman = Peminjaman::where('id', $id)->first();
        $peminjaman->member_id = $request->member_id;
        $peminjaman->produk_id = $request->produk_id;
        $peminjaman->nama_petugas = $request->get('nama_petugas');
        $peminjaman->jumlah_pinjam = $request->get('jumlah_pinjam');
        $peminjaman->total_harga = $request->get('total_harga');
        $peminjaman->tgl_pinjam = $request->get('tgl_pinjam');
        $peminjaman->lama_pinjam = $request->get('lama_pinjam');
        $peminjaman->status = $request->get('status');

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

    public function cetaknota($id){
        $peminjaman = new Peminjaman;
        $peminjaman = $peminjaman->find($id);
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('peminjaman.notapdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream($id);
    }
}
