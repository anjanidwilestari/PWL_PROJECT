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
<<<<<<< HEAD
        return $this->belongsTo('App\Models\KategoriProduk', 'kategori_id', 'id');
=======
        return $this->belongsTo(KategoriProduk::class, 'foreign_key', 'other_key');
>>>>>>> cd1ccdb60bd4a84e0c180d558b1388428baeb695
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
