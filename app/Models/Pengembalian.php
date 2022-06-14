<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalians';
    protected $primaryKey = 'id';

    protected $fillable = [
        'peminjaman_id',
        'status_kembali',
        'keterangan',
        'denda',
    ];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class);
    }
}
