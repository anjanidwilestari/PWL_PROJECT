<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Member;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\Produk;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function cetak_pdf_member(){
        $member = Member::all();
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('member.memberpdf',['member'=>$member], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function cetak_pdf_pegawai(){
        $pegawai = Pegawai::all();
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('pegawai.pegawaipdf',['pegawai'=>$pegawai], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function cetak_pdf_kategori(){
        $kategoriproduk = KategoriProduk::all();
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('kategoriproduk.kategoriprodukpdf',['kategoriproduk'=>$kategoriproduk], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function cetak_pdf_produk(){
        $produk = Produk::all();
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('produk.produkpdf',['produk'=>$produk], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function cetak_pdf_peminjaman(){
        $peminjaman = Peminjaman::all();
        // $produk = Produk::all();
        // $member = Member::all();
        $tanggal = Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadview('peminjaman.peminjamanpdf',['peminjaman'=>$peminjaman], ['tanggal'=>$tanggal])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }
}
