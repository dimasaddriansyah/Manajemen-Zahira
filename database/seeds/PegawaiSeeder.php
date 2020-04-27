<?php

use Illuminate\Database\Seeder;
use App\pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pegawai::create([
            'name' => 'Pegawai Satu',
            'email' => 'pegawai@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Azizah',
            'email' => 'azizah@gmail.com',
            'password' => bcrypt('azizah'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331124'
        ]);
        pegawai::create([
            'name' => 'Pranata',
            'email' => 'pranata@gmail.com',
            'password' => bcrypt('pranata'),
            'alamat' => 'Cirebon',
            'no_hp' => '08899331152'
        ]);
        pegawai::create([
            'name' => 'Pegawai Dua',
            'email' => 'pegawaidua@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Tiga',
            'email' => 'pegawaitiga@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Empat',
            'email' => 'pegawaiempat@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Lima',
            'email' => 'pegawailima@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'a',
            'email' => 'a@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'b',
            'email' => 'b@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Lima',
            'email' => 'c@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Lima',
            'email' => 'd@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Lima',
            'email' => 'f@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Lima',
            'email' => 'n@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Lima',
            'email' => 'q@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
        pegawai::create([
            'name' => 'Pegawai Lima',
            'email' => 'w@gmail.com',
            'password' => bcrypt('pegawai'),
            'alamat' => 'Indramayu',
            'no_hp' => '08899331122'
        ]);
    }
}
