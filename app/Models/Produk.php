<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Produk extends Model
{
    use HasFactory;
    protected $table ='produks';

    protected $fillable =[
        'kategori_id',
        'nama_produk',
        'kode_produk',
        'gambar',
        'harga',
        'satuan',
    ];

    public function kategoriproduk(){
        return $this->belongsTo(KategoriProduk::class, 'foreign_key', 'other_key');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
