<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';

    protected $fillable = [
        'nama',
        'foto',
        'alamat',
        'tanggal_lahir',
        'jabatan',
        'kode_pegawai',
    ];

    public function getUmurAttribute(){
        $umur = Carbon::parse($this->tanggal_lahir)->diff(Carbon::now())->format('%y Tahun');
        return $umur;
    }
}
