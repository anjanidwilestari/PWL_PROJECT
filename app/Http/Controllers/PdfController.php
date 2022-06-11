<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Pegawai;
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
}
