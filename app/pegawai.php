<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = 'pegawai';

    public function transaksi_barang()
    {
        return $this->hasMany('App\transaksi_barang');
    }
}
