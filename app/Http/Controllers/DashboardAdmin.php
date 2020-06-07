<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\pegawai;
use App\supplier;
use App\barang;
use App\barang_masuk;
use App\transaksi_barang;

class DashboardAdmin extends Controller
{
    public function tampil()
    {
        $admin  = admin::get();
        $pegawai = pegawai::get();
        $supplier = supplier::get();
        $barang = barang::get();
        $barang_masuk = barang_masuk::get();
        $transaksi_barang = transaksi_barang::where('status', 1)->get();
        
        return view('/admin/index', compact('admin', 'pegawai', 'supplier', 'barang', 'barang_masuk', 'transaksi_barang'));

    }
}
