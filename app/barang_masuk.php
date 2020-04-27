<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    protected $table = 'barang_masuk';

    public function barang()
	{
		return $this->belongsTo('App\barang');
	}

	public function supplier()
	{
		return $this->belongsTo('App\supplier');
	}
}
