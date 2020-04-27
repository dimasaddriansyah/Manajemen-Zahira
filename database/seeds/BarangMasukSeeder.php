<?php

use Illuminate\Database\Seeder;
use App\barang_masuk;
use Carbon\Carbon;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        barang_masuk::create([
            'barang_id' => '1',
            'supplier_id' => '1',
            'jumlah_masuk' => '20',
            'tgl_masuk' => Carbon::now()
        ]);
    }
}



