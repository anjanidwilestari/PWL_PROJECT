<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'nama' => 'Bella Sonia',
            'alamat' => 'Mojokerto',
            'tanggal_lahir' => '2002-02-25',
            'jabatan' => 'Admin',
        ]);
    }
}
