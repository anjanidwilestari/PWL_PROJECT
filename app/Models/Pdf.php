<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;

    public function getMemberUmur(){
        $member = Member::all();
        $umur = Carbon::parse($member->tanggal_lahir)->diff(Carbon::now())->format('%y Tahun');
        return $umur;
    }
}
