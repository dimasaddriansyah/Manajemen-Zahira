<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\barang;
use App\kategori;
use App\lp_barang_masuk;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BarangController extends Controller
{
    public function tampilTambah(){
        $barang = barang::all();
        $kategori = kategori::All();

        return view('/admin/barang/tambah', compact('barang' ,'kategori'));
    }

    public function getBarang(){
        $data = barang::All();
        $kategori = kategori::All();
        return view('/admin/barang/index', compact('data', 'kategori'));
        // echo $barang;
    }

    public function addBarang(Request $request){
        //Simpan Ke Database Barang
        $barang = new barang();
        $tanggall = Carbon::now();
 

        $barang->name = $request->name;
        $barang->kategori_id = $request->kategori;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->tanggal = $tanggall;
        $barang->status = $request->status;
        $barang->save();

        /*Simpan Ke Database Laporan Barang Masuk
        $lp_barang_masuk = new lp_barang_masuk;
        $lp_barang_masuk->harga_jual = $barang->harga;
        $lp_barang_masuk->save();
        */
  
        return redirect('/admin/barang/index');

        
    }

    public function deleteBarang($id){
        barang::where('id', $id)->delete();

        return redirect('/admin/barang/index');
    }

    public function formBarang($id){
        $barang = barang::where('id', $id)->first();
        $kategori = kategori::All();

        return view('/admin/barang/edit', compact('barang', 'kategori'));
    }
    public function editBarang(Request $request,$id){
        barang::where('id', $id)
                ->update([
                    'name'=>$request->name,
                    'kategori_id'=>$request->kategori,
                    'stok'=>$request->stok,
                    'harga'=>$request->harga,
                ]);

    return redirect('/admin/barang/index');
    }
}
