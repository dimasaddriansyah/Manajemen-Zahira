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
        $this->validate($request, [
            'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
        ]);

        $kategori = new kategori();
        $kategori->name = ucwords($request->name);
        $kategori->save();

        return redirect('/admin/kategori/index');
    }

    public function formKategori($id){
        $kategori = kategori::where('id', $id)->first();

        return view('/admin/kategori/edit', compact('kategori'));
    }
    public function editKategori(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
        ]);
        
        kategori::where('id', $id)
                ->update([
                    'name'=>ucwords($request->name),
                ]);

    return redirect('/admin/kategori/index');
    }

    public function deleteKategori($id){
        kategori::where('id', $id)->delete();

        return redirect('/admin/kategori/index');
    }
}
