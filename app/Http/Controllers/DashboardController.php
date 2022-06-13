<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\Produk;
use App\Models\Member;
use App\Models\Pegawai;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $get_data_peminjaman = Peminjaman::get();
        $data_produk = [];

        $members = Member::count();
        $pegawais = Pegawai::count();
        $peminjamans = Peminjaman::count();
        $produks = Produk::count();

        $period = CarbonPeriod::create(Carbon::now()->firstOfMonth(), Carbon::now()->endOfMonth());
        foreach ($period as $key => $date) {
            $data_hari[$key] = $date->format('d');
            $data_peminjam[$key] =  $get_data_peminjaman->where('tgl_pinjam',$date->format('Y-m-d'))->count();
        }

        $get_data_produk = Peminjaman::groupBy('produk_id')
        ->selectRaw('count(produk_id) as sum, produk_id')
        ->pluck('sum','produk_id');

        foreach($get_data_produk as $key => $value){
            $data_produk[$key] = [
            'name' => Produk::where('id', $key)->first()->nama_produk,
            'y' => $value,
            ];
        }


        // dd(array_merge($data_buku), $data_peminjam);
        $data = [
            'hari'     => $data_hari,
            'peminjam' => $data_peminjam,
            'pegawais' => $pegawais,
            'members' => $members,
            'peminjamans' => $peminjamans,
            'produks' => $produks,
            'bulan' => [
                'Transaksi Peminjaman Bolang Gunung di Bulan '.Carbon::now()->format('F'),
            ],
            'produk' => array_merge($data_produk),
        ];
        return view('admin.dashboard', $data);
    }
}
