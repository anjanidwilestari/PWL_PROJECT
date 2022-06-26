<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Member;
use App\Models\Peminjaman;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KlienController extends Controller
{
    public function home()
    {
        return view('klien.home');
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
    public function createmember()
    {
        return view('klien.member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storemember(Request $request)
    {
        $request -> validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|max:13',
            'tanggal_lahir' => 'required',
            'ktp' => 'required',
        ]);

        $member = new Member();
        $member->nama = $request->get('nama');
        $member->ktp = $request->file('ktp')->store('imagesmember','public');
        if ($request->file('kartu_pelajar') == null) {
            $member->kartu_pelajar = "Tidak ada";
        }else{
           $member->kartu_pelajar = $request->file('kartu_pelajar')->store('imagesmember','public');  
        }
        $member->no_hp = $request->get('no_hp');
        $member->alamat = $request->get('alamat');
        $member->tanggal_lahir = $request->get('tanggal_lahir');
        $member->kode_member = Helper::KodeMemberGenerator();

        $member->save();
        
        Alert::success('Data Member Berhasil Disimpan');
        return redirect()->route('member.home');
    }

    public function createsewa()
    {
        $member = Member::all();
        $produk = Produk::all();
        return view('klien.sewa',['member'=>$member], ['produk'=>$produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storesewa(Request $request)
    {
        $request -> validate([
            'member_id' => 'required',
            'produk_id' => 'required',
            'jumlah_pinjam' => 'required',
        ]);

        $peminjaman = new Peminjaman();
        $peminjaman->member_id = $request->member_id;
        $peminjaman->produk_id = $request->produk_id;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->tgl_pinjam = Carbon::now();
        $peminjaman->lama_pinjam = $request->lama_pinjam;
        $peminjaman->status = 'Konfirmasi';
        $peminjaman->nama_petugas = 'Tanpa Petugas';
        $peminjaman->kode_peminjaman = Helper::KodePeminjamanGenerator();
        
        $peminjaman->save();
        
        Alert::success('Permintaan Anda Sedang Diproses');
        return redirect()->route('member.home');
    }
}
