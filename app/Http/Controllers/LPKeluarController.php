<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LPKeluarController extends Controller
{
    public function Index(){
        $data = barang_masuk::All();
        $barang = barang::All();
        $supplier = supplier::All();
        return view('/admin/barang_masuk/index', compact('data', 'barang' , 'supplier'));
        // echo $barang_masuk;
    }
}
