<?php

namespace App\Http\Controllers;

use App\transaksi;

class TransaksiController extends Controller
{
    public function getTransaksi(){
        $transaksi = transaksi::where('status', 1)->get();

        return view('/admin/transaksi/index', compact('transaksi'));
    }
}
