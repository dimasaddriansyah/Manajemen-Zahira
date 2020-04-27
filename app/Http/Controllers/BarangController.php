<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\barang;
use App\kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BarangController extends Controller
{
    public function tampilTambah(){
        $kategori = kategori::All();
       
        return view('/admin/barang/tambah', compact('kategori'));
    }

    public function tampilEdit(){
        $barang = barang::All();
        $kategori = kategori::All();

        return view('/admin/barang/tambah');
    }

    public function getBarang(){
        $data = barang::All();
        $kategori = kategori::All();
        return view('/admin/barang/index', compact('data', 'kategori'));
        // echo $barang;
    }

    public function addBarang(Request $request){
        $barang = new barang();
        $tanggal = Carbon::now();

        $barang->name = $request->name;
        $barang->kategori_id = $request->kategori;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->tanggal = $tanggal;
        $barang->status = $request->status;
        $barang->save();
  
        alert()->success('Barang Berhasil Di Tambah !', 'Success');
        return redirect('/admin/barang/index');

        
    }

    public function deleteBarang($id){
        barang::where('id', $id)->delete();

        alert()->error('Data Barang Berhasil Di Hapus !', 'Delete');
        return redirect('/admin/barang/index');
    }

    /*
    public function formbarang($id){
        $barang = barang::where('id', $id)->first();

        return view('/halaman-admin/content/edit', compact('barang'));
    }
    public function editbarang(Request $request,$id){
        barang::where('id', $id)
                ->update([
                    'nama'=>$request->nama,
                    'harga'=>$request->harga,
                    'stok'=>$request->stok,
                    'keterangan'=>$request->keterangan,
                ]);

    return redirect('/halaman-admin/content/barang');
    }*/
}
