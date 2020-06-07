<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\barang;
use App\kategori;
use App\lp_barang_masuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use SweetAlert;



class BarangController extends Controller
{
    public function tampilTambah(){
        $barang = barang::all();
        $kategori = kategori::All();

        return view('/admin/barang/tambah', compact('barang' ,'kategori'));
    }

    public function getBarang(){
        $data = barang::orderBy('stok')->get();
        $kategori = kategori::All();
        return view('/admin/barang/index', compact('data', 'kategori'));
    }

    public function json(){
        return Datatables::of(barang::all())->make(true);
    }
    
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $suppliers = supplier::where('name','LIKE',"%".$cari."%")->paginate(5);
        return view('/admin/supplier/index',compact('suppliers'));
    }

    public function addBarang(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:barang|min:4|regex:/^[\pL\s\-]+$/u',
            'harga' => 'required',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.unique' => 'Nama Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'harga.required' => 'Harus Mengisi Bagian Harga !',
        ]);
        //Simpan Ke Database Barang
        $barang = new barang();
        $tanggall = Carbon::now();
 

        $barang->name = ucwords($request->name);
        $barang->kategori_id = $request->kategori;
        $barang->stok = 0;
        $barang->harga = $request->harga;
        $barang->tanggal = $tanggall;
        $barang->save();

        alert()->success('Data Berhasil Di Tambah !', 'Success');
        return redirect('/admin/barang/index');
    }

    public function deleteBarang($id){
        barang::where('id', $id)->delete();

        alert()->error('Data Terhapus !', 'Deleted');
        return redirect('/admin/barang/index');
    }

    public function formBarang($id){
        $barang = barang::where('id', $id)->first();
        $kategori = kategori::All();

        return view('/admin/barang/edit', compact('barang', 'kategori'));
    }
    public function editBarang(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'stok.required' => 'Harus Mengisi Bagian Stok !',
            'stok.numeric' => 'Harus Pakai Nomer !',
            'harga.required' => 'Harus Mengisi Bagian Harga !',
            'harga.numeric' => 'Harus Pakai Nomer !',
        ]);
        barang::where('id', $id)
                ->update([
                    'name'=>$request->name,
                    'kategori_id'=>$request->kategori,
                    'stok'=>$request->stok,
                    'harga'=>$request->harga,
                ]);        

    alert()->success('Data Berhasil Di Update !', 'Success');
    return redirect('/admin/barang/index');
    }
}
