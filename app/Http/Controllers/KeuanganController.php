<?php

namespace App\Http\Controllers;

use App\transaksi_detail;

class KeuanganController extends Controller
{
    public function getKeuangan()
    {
        $keuangan = transaksi_detail::all();
        return view('admin.keuangan.index', compact('keuangan'));
    }
}
