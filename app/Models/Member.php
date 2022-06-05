<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';

    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'umur',
        'ktp',
        'kartu_pelajar',
        'kode_member'
    ];
}
