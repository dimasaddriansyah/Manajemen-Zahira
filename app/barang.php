<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';

    public function kategori()
	{
		return $this->belongsTo('App\kategori');
	}

	public function transaksi_detail()
	{
		return $this->hasMany('App\transaksi_detail');
	}

	public function barang_masuk()
	{
		return $this->hasMany('App\barang_masuk');
	}

	public function getCreatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
    return \Carbon\Carbon::parse($this->attributes['created_at'])
       ->translatedFormat('l, d F Y H:i');
    }

}
