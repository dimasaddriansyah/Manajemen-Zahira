<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_barang extends Model
{
    protected $table = 'transaksi';

    public function transaksi_detail()
    {
        return $this->hasMany('App\transaksi_detail', 'transaksi_id', 'id');
    }

    public function getCreatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
    return \Carbon\Carbon::parse($this->attributes['created_at'])
       ->translatedFormat('l, d F Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
    return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->translatedFormat();
    }
    
}
