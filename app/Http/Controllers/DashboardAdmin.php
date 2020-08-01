<?php

namespace App\Http\Controllers;

use App\admin;
use App\pegawai;
use App\supplier;
use App\barang;
use App\transaksi;

class DashboardAdmin extends Controller
{
    public function tampil()
    {
        $admin  = admin::get();
        $pegawai = pegawai::get();
        $supplier = supplier::get();
        $barang = barang::get();
        $transaksi = transaksi::where('status', 1)->get();

        return view('/admin/index', compact('admin', 'pegawai', 'supplier', 'barang', 'transaksi'));

    }
}
