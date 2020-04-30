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
        supplier::create([
            'name' => 'Toko Makmur',
            'alamat' => 'Jl. Pasar Mambo Indramayu',
            'no_hp' => '089514391353'
        ]);
        supplier::create([
            'name' => 'Toko Alat Masak Tuparev',
            'alamat' => 'Jl. Raya Tuparev Cirebon',
            'no_hp' => '089514391354'
        ]);
    }
}
