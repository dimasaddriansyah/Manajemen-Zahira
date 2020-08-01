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

    public function transaksi()
    {
        return $this->belongsTo('App\transaksi', 'transaksi_id', 'id');
    }
}
