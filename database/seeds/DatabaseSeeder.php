<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(PegawaiSeeder::class);
        //$this->call(SupplierSeeder::class);
        //$this->call(KategoriSeeder::class);
        //$this->call(BarangSeeder::class);
        //$this->call(BarangMasukSeeder::class);
    }
}
