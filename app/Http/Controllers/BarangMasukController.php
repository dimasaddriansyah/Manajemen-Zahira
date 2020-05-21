<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang_masuk;
use App\supplier;
use App\barang;
use Carbon\Carbon;
use SweetAlert;

class BarangMasukController extends Controller
{

    public function getBarangMasuk(){
        $data = barang_masuk::All();
        $barang = barang::All();
        $supplier = supplier::All();
        return view('/admin/barang_masuk/index', compact('data', 'barang' , 'supplier'));
    }

    public function tampilTambah(){
        $data = barang_masuk::All();
        $barang = barang::All();
        $supplier = supplier::All();

        return view('/admin/barang_masuk/tambah', compact('data', 'barang', 'supplier'));
    }

    public function json(){
        return Datatables::of(barang::all())->make(true);
    }
    
    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $data = barang_masuk::where('name','LIKE',"%".$cari."%")->get();
        return view('/admin/barang_masuk/index',compact('data'));
    }

    public function addBarangMasuk(Request $request){
        $barang_masuk = new barang_masuk();

        $tanggal = Carbon::now();

        $barang_masuk->barang_id = $request->barang;
        $barang_masuk->supplier_id = $request->supplier;
        $barang_masuk->harga_beli= $request->harga_beli;
        $barang_masuk->jumlah_masuk = $request->jumlah;
        $barang_masuk->tgl_masuk = $tanggal;
        $barang_masuk->save();

        $barang = barang::find($request->barang);
        $stok_sementara = $barang->stok + $request->jumlah; 
        $barang->stok = $stok_sementara;
        $barang->update();

        alert()->success('Data Berhasil Di Tambah dan Stok Bertambah !', 'Success');
        return redirect('/admin/barang/index');

        
    }

    public function formBarangMasuk($id){
        $barang_masuk = barang_masuk::where('id', $id)->first();
        $barang = barang::All();
        $supplier = supplier::All();

        return view('/admin/barang_masuk/edit', compact('barang_masuk', 'barang', 'supplier'));
    }
    public function editBarangMasuk(Request $request,$id){
        barang_masuk::where('id', $id)
                ->update([
                    'supplier_id'=>$request->supplier,
                    'barang_id'=>$request->barang,
                    'harga_beli'=> $request->harga_beli,
                    'jumlah_masuk'=>$request->jumlah,
                ]);
    
    alert()->success('Data Berhasil Di Update !', 'Success');
    return redirect('/admin/barang_masuk/index');
    }

    public function deleteBarangMasuk(Request $request,$id){
        $barang_masuk = barang_masuk::where('id', $id)->first();
        $barang = barang::where('id', $barang_masuk->barang->id)->first();

        $barang->stok = $barang_masuk->barang->stok-$barang_masuk->jumlah_masuk;
        $barang->update();

        $barang_masuk->delete();
    
        alert()->error('Data Terhapus !', 'Deleted');
        return redirect('/admin/barang_masuk/index');
    }
}
