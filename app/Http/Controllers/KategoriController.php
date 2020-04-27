<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;

class KategoriController extends Controller
{
    public function getKategori(){
        $kategori = kategori::All();
        return view('/admin/kategori/index', compact('kategori'));
        // echo $kategori;
    }

    public function tampilTambah(){
        $kategori = kategori::All();

        return view('/admin/kategori/tambah', compact('kategori'));
    }

    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $data = kategori::where('tgl','LIKE','%'.$cari.'%')->get();
        return view('/admin/kategori/index',compact('data'));
    }

    public function addKategori(Request $request){
        $kategori = new kategori();

        $kategori->name = $request->name;
        $kategori->save();

        alert()->success('Kategori Berhasil Di Tambah !', 'Success');
        return redirect('/admin/kategori/index');

        
    }

    public function deleteKategori($id){
        kategori::where('id', $id)->delete();

        return redirect('/admin/kategori/index');
    }
}
