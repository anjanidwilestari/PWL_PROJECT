<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Produk;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    
    protected $fillable = [
        'member_id',
        'produk_id',
        'nama_petugas',
        'jumlah_pinjam',
        'total_harga',
        'harga_satuan',
        'tgl_pinjam',
        'lama_pinjam',
        'status_bayar',
        'status'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }

}
