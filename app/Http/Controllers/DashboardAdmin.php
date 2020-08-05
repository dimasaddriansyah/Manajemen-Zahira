<?php

namespace App\Http\Controllers;

use App\admin;
use App\pegawai;
use App\supplier;
use App\barang;
use App\transaksi;
use App\transaksi_detail;

class DashboardAdmin extends Controller
{
    public function tampil()
    {
        $admin  = admin::get();
        $pegawai = pegawai::get();
        $supplier = supplier::get();
        $barang = barang::get();
        $transaksi = transaksi::where('status', 1)->get();
        $keuangan = transaksi_detail::get();
        $keuntungan = 0;
        foreach ($keuangan as $k) {
            $untung = $k->jumlah_harga - ($k->jumlah_beli * $k->barang->harga_beli);
            $keuntungan += $untung;
        }

        return view('/admin/index', compact('admin', 'pegawai', 'supplier', 'barang', 'transaksi', 'keuntungan'));

    }
}
