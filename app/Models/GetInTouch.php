<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetInTouch extends Model
{
    use HasFactory;
    protected $table = 'get_in_touches';

    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'pesan',
    ];
}
