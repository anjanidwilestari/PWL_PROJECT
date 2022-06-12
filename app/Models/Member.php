<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';

    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'no_hp',
        'ktp',
        'kartu_pelajar',
        'kode_member'
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function getUmurAttribute(){
        $umur = Carbon::parse($this->tanggal_lahir)->diff(Carbon::now())->format('%y Tahun');
        return $umur;
    }
}
