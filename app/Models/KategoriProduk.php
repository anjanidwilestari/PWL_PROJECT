<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class KategoriProduk extends Model
{
    use HasFactory;
    protected $table = 'kategori_produks';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function produk(){
        return $this->hasMany('App\Produk', 'foreign_key', 'local_key');
    }
}
