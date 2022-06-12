<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriProduk;
use App\Models\Peminjaman;

class Produk extends Model
{
    use HasFactory;
    protected $table ='produks';
    protected $primaryKey = 'id';

    protected $fillable =[
        'kategori_id',
        'nama_produk',
        'kode_produk',
        'gambar',
        'biaya_per_hari',
    ];

    public function kategoriproduk(){
        return $this->belongsTo(KategoriProduk::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
