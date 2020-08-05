<?php

namespace App\Http\Controllers;

use App\transaksi;
use App\transaksi_detail;

class KeuanganController extends Controller
{
    public function getKeuangan()
    {
        $keuangan = transaksi_detail::all();
        $pendapatan = transaksi::sum('jumlah_harga');
        $keuntungan = 0;
        foreach ($keuangan as $k) {
            $untung = $k->jumlah_harga - ($k->jumlah_beli * $k->barang->harga_beli);
            $keuntungan += $untung;
        }
        return view('admin.keuangan.index', compact('keuangan','pendapatan','keuntungan'));
    }
}
