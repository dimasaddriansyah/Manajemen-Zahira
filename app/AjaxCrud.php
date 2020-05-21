<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AjaxCrud extends Model
{
    protected $fillable = [
        'nama', 'nim', 'kelas', 'jurusan'
       ];
}
