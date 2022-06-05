<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_produks')->insert([
            'nama_kategori' => 'Tenda',
            'deskripsi' => 'Tempat berteduh untuk pendakian dan camping',
        ]);
    }
}
