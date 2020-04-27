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

}
