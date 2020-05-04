<?php

namespace App\Http\Controllers;
use App\lp_barang_masuk;
use App\barang_masuk;
use App\barang;

use Illuminate\Http\Request;

class LPMasukController extends Controller
{
    public function Index(){
        $lp_barang_masuk = lp_barang_masuk::All();
        $barang_masuk = barang_masuk::All();
        $barang = barang::All();
        return view('/admin/lp_barang_masuk/index', compact('lp_barang_masuk', 'barang_masuk', 'barang'));
        // echo $barang_masuk;
    }
}
