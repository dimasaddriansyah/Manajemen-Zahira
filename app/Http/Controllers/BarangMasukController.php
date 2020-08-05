<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\supplier;
use App\kategori;
use Carbon\Carbon;
use SweetAlert;

class BarangMasukController extends Controller
{
    public function getBarang(){
        $data = barang::orderBy('stok')->get();
        $kategori = kategori::All();
        return view('/admin/barang/index', compact('data', 'kategori'));
    }

    public function getBarangMasuk(){
        $data = barang::orderBy('created_at', 'DESC')->get();
        $supplier = supplier::All();
        return view('/admin/barang_masuk/index', compact('data', 'supplier'));
    }

    public function tampilTambah2(){
        $data = barang::All();
        $supplier = supplier::All();
        $kategori = kategori::all();
        return view('/admin/barang_masuk/tambah2', compact('data', 'supplier', 'kategori'));
    }

    public function addBarangMasuk2(Request $request){
        $this->validate($request, [
            'supplier' => 'required',
            'kategori' => 'required',
            'nama_barang' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
            'harga_beli' => 'required|min:1|integer',
            'harga_jual' => 'required|min:1|integer',
            'jumlah' => 'required|min:1|integer',
        ],
        [
            'supplier.required' => 'Harus Mengisi Bagian Nama Supllier !',
            'kategori.required' => 'Harus Mengisi Bagian Nama Kategori !',
            'nama_barang.required' => 'Harus Mengisi Bagian Nama Barang !',
            'nama_barang.min' => 'Minimal 4 Karakter !',
            'nama_barang.regex' => 'Inputan Nama Tidak Valid !',
            'harga_beli.required' => 'Harus Mengisi Bagian Harga Beli !',
            'harga_beli.min' => 'Tidak Boleh 0 Atau Minus !',
            'harga_jual.required' => 'Harus Mengisi Bagian Harga Jual !',
            'harga_jual.min' => 'Tidak Boleh 0 Atau Minus !',
            'jumlah.required' => 'Harus Mengisi Bagian Jumlah Barang !',
            'jumlah.min' => 'Tidak Boleh 0 Atau Minus !',
        ]);

        $barang = new barang();

        $tanggal = Carbon::now();

        $barang->nama_barang = ucwords($request->nama_barang);
        $barang->supplier_id = $request->supplier;
        $barang->kategori_id = $request->kategori;
        $barang->harga_beli= $request->harga_beli;
        $barang->harga_jual= $request->harga_jual;
        $barang->jumlah_masuk = $request->jumlah;
        $barang->tgl_masuk = $tanggal;
        $barang->stok = $request->jumlah;
        if($barang->stok <= 0){
            $barang->status = 1;
        }elseif($barang->stok < 5){
            $barang->status = 2;
        }else{
            $barang->status = 3;
        }
        $barang->save();

        alert()->success('Data Berhasil Di Tambah dan Stok Bertambah !', 'Success');
        return redirect('/admin/barang/index');
    }

    public function formBarangMasuk($id){
        $barang = barang::where('id', $id)->first();
        $supplier = supplier::All();

        return view('/admin/barang_masuk/edit', compact('barang', 'supplier'));
    }
    public function editBarangMasuk(Request $request,$id){
        $this->validate($request, [
            'harga_beli' => 'required|min:1|integer',
            'harga_jual' => 'required|min:1|integer',
        ],
        [
            'harga_beli.required' => 'Harus Mengisi Bagian Harga Beli !',
            'harga_beli.min' => 'Tidak Boleh 0 Atau Minus !',
            'harga_jual.required' => 'Harus Mengisi Bagian Harga Jual !',
            'harga_jual.min' => 'Tidak Boleh 0 Atau Minus !',
        ]);

        $update = Carbon::now();
        barang::where('id', $id)
                ->update([
                    'harga_beli'=> $request->harga_beli,
                    'harga_jual'=>$request->harga_jual,
                    'updated_at'=>$update,
                ]);

    alert()->success('Data Berhasil Di Update !', 'Success');
    return redirect('/admin/barang_masuk/index');
    }

    public function tampilAddStok($id){
        $barang = barang::where('id', $id)->first();
        $supplier = supplier::All();

        return view('/admin/barang_masuk/tambah_stok', compact('barang', 'supplier'));
    }

    public function addStok(Request $request, $id){
        $this->validate($request, [
            'stok' => 'required|min:1|integer',
        ],
        [
            'stok.required' => 'Harus Mengisi Bagian Harga Stok !',
            'stok.min' => 'Tidak Boleh 0 Atau Minus !',
        ]);
        barang::where('id', $id)
                ->update([
                    'stok'=> $request->stok,
                ]);

        $barang = barang::where('id',$id)->first();
        $barang->jumlah_masuk = $barang->stok;
        if($barang->stok <= 0){
            $barang->status = 1;
        }elseif($barang->stok < 5){
            $barang->status = 2;
        }else{
            $barang->status = 3;
        }
        $barang->update();

    alert()->success('Data Berhasil Di Update !', 'Success');
    return redirect('/admin/barang/index');
    }

    public function deleteBarang($id){
        barang::where('id', $id)->delete();

        alert()->error('Data Terhapus !', 'Deleted');
        return redirect('/admin/barang/index');
    }
}
