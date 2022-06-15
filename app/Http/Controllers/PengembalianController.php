<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
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
            ->with('i', (request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        $peminjaman = Peminjaman::where('status','Dipinjam')->get();
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
        ]);
        $pengembalian = new Pengembalian;
        $pengembalian->peminjaman_id = $request->peminjaman_id;
        $pengembalian->status_kembali = $request->status_kembali;
        $pengembalian->keterangan = $request->keterangan;
        $pengembalian->denda = $request->denda;
        $pengembalian->save();
        //$pengembalian->created_at = $request->created_at;
        $peminjaman = Peminjaman::find($request->peminjaman_id);
        $peminjaman -> status = 'Dikembalikan';
        $peminjaman -> save();

        
        Alert::success('Data Pengembalian Berhasil Ditambahkan');
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
        $peminjaman = Peminjaman::all();
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
        
        $peminjaman = Peminjaman::all();
        $pengembalian = Pengembalian::find($id);
        return view('pengembalian.pengembalianedit',compact('pengembalian','peminjaman'));
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
            'peminjaman_id' => 'required',
            'status_kembali' => 'required',
            
        ]);
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->peminjaman_id = $request->get('peminjaman_id');
        $pengembalian->status_kembali = $request->get('status_kembali');
        $pengembalian->keterangan = $request->get('keterangan');
        $pengembalian->denda = $request->get('denda');
        // $pengembalian->created_at = $request->get('created_at');

        $pengembalian->save();

        return redirect()->route('pengembalian.index')
        ->with('success', 'Data Pengembalian Berhasil Diupdate');
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
        Pengembalian::find($id)->delete();
        return redirect()->route('pengembalian.index')
            -> with('success', 'Data Pengembalian Berhasil Dihapus');
    }

    // public function cetak_pdf_pengembalian(){
    //     $peminjaman = Peminjaman::all();
    //     $tanggal = Carbon::now()->format('d-m-Y');

    //     $pdf = PDF::loadview('peminjaman.peminjamanpdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
    //     return $pdf->stream();
    // }
}
