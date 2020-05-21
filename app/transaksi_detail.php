<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_detail extends Model
{
    protected $table = 'transaksi_detail';

    public function barang()
    {
        return $this->belongsTo('App\barang', 'barang_id', 'id');
    }

    public function transaksi_barang()
    {
        return $this->belongsTo('App\transaksi_barang', 'transaksi_id', 'id');
    }
}
