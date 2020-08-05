<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';

	public function supplier()
	{
		return $this->belongsTo('App\supplier');
	}

    public function kategori()
	{
		return $this->belongsTo('App\kategori');
    }

    public function transaksi_detail()
	{
		return $this->hasMany('App\transaksi_detail');
	}

	public function getTglMasukAttribute()
    {
        \Carbon\Carbon::setLocale('id');
    return \Carbon\Carbon::parse($this->attributes['tgl_masuk'])
       ->translatedFormat('l, d F Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
    return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
    }
}
