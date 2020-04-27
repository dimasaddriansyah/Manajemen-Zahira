<?php

use Illuminate\Database\Seeder;
use App\kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori::create([
            'name' => 'Alat Masak'
        ]);
        kategori::create([
            'name' => 'Alat Mandi'
        ]);
        kategori::create([
            'name' => 'Alat Kebersihan'
        ]);
    }
}