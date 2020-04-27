<?php

use Illuminate\Database\Seeder;
use App\barang;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        barang::create([
            'name' => 'Panci',
            'kategori_id' => '1',
            'stok' => '5',
            'harga' => '50000',
            'tanggal' => Carbon::now(),            
            'status' => 'Masih Banyak'            
        ]);
        barang::create([
            'name' => 'Wajan',
            'kategori_id' => '1',
            'stok' => '10',
            'harga' => '40000',
            'tanggal' => Carbon::now(),            
            'status' => 'Masih Banyak'            
        ]);
        barang::create([
            'name' => 'Sapu',
            'kategori_id' => '3',
            'stok' => '15',
            'harga' => '20000',
            'tanggal' => Carbon::now(),            
            'status' => 'Masih Banyak'            
        ]);
    }
}