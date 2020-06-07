<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi_barang;
use App\Http\Controllers\PDF;

class TransaksiController extends Controller
{
    public function getTransaksi(){
        $transaksi_barangs = transaksi_barang::where('status', 1)->get();

        return view('/admin/transaksi/index', compact('transaksi_barangs'));
    }

    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $data = transaksi_barang::where('nama_pembeli','LIKE',"%".$cari."%")->get();
        return view('/admin/transaksi/index',compact('data'));
    }
}
