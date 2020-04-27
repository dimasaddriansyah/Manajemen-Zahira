<?php

use Illuminate\Database\Seeder;
use App\admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::create([
            'name' => 'Dimas Addriansyah',
            'email' => 'dimas@gmail.com',
            'password' => bcrypt('dimas')
        ]);
        admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
