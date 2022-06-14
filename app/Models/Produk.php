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
        'harga',
        'satuan',
    ];

    public function kategoriproduk(){
        return $this->belongsTo('App\Models\KategoriProduk', 'kategori_id', 'id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
