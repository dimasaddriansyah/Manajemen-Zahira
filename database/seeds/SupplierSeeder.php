<?php

use Illuminate\Database\Seeder;
use App\supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        supplier::create([
            'name' => 'Cipto Gudang Rabat',
            'alamat' => 'Jl. Pasar Baru Indramayu',
            'no_hp' => '089514391356'
        ]);
    }
}
