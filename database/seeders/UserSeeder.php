<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Member',
                'username' => 'member',
                'foto' => '/user/img.jpg',
                'email' => 'member@gmail.com',
                'no_hp' => '089876543212',
                'tanggal_lahir' => '2002-02-25',
                'alamat' => 'Mojokerto',
                'role' => 'Member',
                'password' => Hash::make('member'),
            ],
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'foto' => '/admin/img.jpg',
                'email' => 'admin@gmail.com',
                'no_hp' => '081234567890',
                'tanggal_lahir' => '2002-02-25',
                'alamat' => 'Mojokerto',
                'role' => 'Admin',
                'password' => Hash::make('admin'),
            ]
        ]);
    }
}
