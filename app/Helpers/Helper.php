<?php

namespace App\Helpers;

use App\Models\Pegawai as MasterPegawai;

class Helper{
    public static function KodePegawaiGenerator(){
        $kode = 'KP'.date('ymd') .'';
        $cek_kode_pegawai = MasterPegawai::where('kode_pegawai', 'like', '%' . $kode . '%')
        ->select('kode_pegawai')
        ->orderBy('kode_pegawai', 'desc')
        ->first();

        if (!empty($cek_kode_pegawai)) {

            $get_angka_akhir = substr($cek_kode_pegawai->kode_pegawai, -3);
            $get_angka_akhir = $get_angka_akhir + 1;
            // dd($get_angka_akhir);

            $arr_angka = [
                '10' => '00',
                '100' => '0',
                '1000' => '',
            ];
            foreach ($arr_angka as $key_angka => $value_angka) {
//
                // dd($get_angka_akhir, $get_angka_akhir < $key_angka);
                if ($get_angka_akhir < $key_angka) {

                    $kode = $kode .$value_angka. $get_angka_akhir;
                    break;
                }
            }
        } else {

            $kode = $kode . '001';
        }

        return $kode;
    }
}
