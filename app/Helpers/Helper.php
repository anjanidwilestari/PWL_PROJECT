<?php

namespace App\Helpers;

use App\Models\Pegawai as MasterPegawai;
use App\Models\Member as MasterMember;
use App\Models\Produk as MasterProduk;
use App\Models\Peminjaman as MasterPeminjaman;
use Carbon\Carbon;

class Helper{
    public static function KodePegawaiGenerator(){
        $tanggal = Carbon::now()->format('d');
        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('y');
        $thnBlnTgl = $tahun . $bulan . $tanggal;
        $cekJumlah = MasterPegawai::count();
        if($cekJumlah == 0){
            $urut = 10001;
            $nomor = 'KP' . $thnBlnTgl . $urut;
        } else {
            $pegawai = MasterPegawai::all()->last();
            $urut = (int)substr($pegawai->kode_pegawai, -5) + 1;
            $nomor = 'KP' . $thnBlnTgl . $urut;
        }
        return $nomor;
    }

    public static function KodeMemberGenerator(){
        $tanggal = Carbon::now()->format('d');
        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('y');
        $thnBlnTgl = $tahun . $bulan . $tanggal;
        $cekJumlah = MasterMember::count();
        if($cekJumlah == 0){
            $urut = 10001;
            $nomor = 'KM' . $thnBlnTgl . $urut;
        } else {
            $member = MasterMember::all()->last();
            $urut = (int)substr($member->kode_member, -5) + 1;
            $nomor = 'KM' . $thnBlnTgl . $urut;
        }
        return $nomor;
    }

    public static function KodeProdukGenerator(){
        $tanggal = Carbon::now()->format('d');
        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('y');
        $thnBlnTgl = $tahun . $bulan . $tanggal;
        $cekJumlah = MasterProduk::count();
        if($cekJumlah == 0){
            $urut = 10001;
            $nomor = 'KR' . $thnBlnTgl . $urut;
        } else {
            $produk = MasterProduk::all()->last();
            $urut = (int)substr($produk->kode_produk, -5) + 1;
            $nomor = 'KR' . $thnBlnTgl . $urut;
        }
        return $nomor;
    }

    public static function KodePeminjamanGenerator(){
        $tanggal = Carbon::now()->format('d');
        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('y');
        $thnBlnTgl = $tahun . $bulan . $tanggal;
        $cekJumlah = MasterPeminjaman::count();
        if($cekJumlah == 0){
            $urut = 10001;
            $nomor = 'KT' . $thnBlnTgl . $urut;
        } else {
            $peminjaman = MasterPeminjaman::all()->last();
            $urut = (int)substr($peminjaman->kode_peminjaman, -5) + 1;
            $nomor = 'KT' . $thnBlnTgl . $urut;
        }
        return $nomor;
    }
}
