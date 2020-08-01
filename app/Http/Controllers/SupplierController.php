<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supplier;
use Alert;

class SupplierController extends Controller
{

    public function tampilTambah(){
        return view('/admin/supplier/tambah');
    }

    public function getSupplier(){

        $suppliers = supplier::all();
        return view('/admin/supplier/index', compact('suppliers'));
    }

    public function addSupplier(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:supplier|min:4|regex:/^[\pL\s\-]+$/u',
            'alamat' => 'required|min:6',
            'no_hp' => 'required|min:10|numeric|unique:supplier',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.unique' => 'Nama Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'alamat.required' => 'Harus Mengisi Bagian Alamat !',
            'alamat.min' => 'Minimal 6 Karakter !',
            'no_hp.required' => 'Harus Mengisi Bagian No Hp !',
            'no_hp.min' => 'Minimal 10 Karakter !',
            'no_hp.numeric' => 'Harus Pakai Nomer !',
            'no_hp.unique' => 'No Hp Sudah Terdaftar !',

        ]);
        $supplier = new supplier();

        $supplier->name = ucwords($request->name);
        $supplier->alamat = ucwords($request->alamat);
        $supplier->no_hp = $request->no_hp;
        $supplier->save();

        alert()->success('Data Berhasil Di Tambah !', 'Success');
        return redirect('/admin/supplier/index');
    }

    public function deletesupplier($id){
        supplier::where('id', $id)->delete();

        alert()->error('Data Terhapus !', 'Deleted');
        return redirect('/admin/supplier/index');
    }

    public function formSupplier($id){
        $supplier = supplier::where('id', $id)->first();

        return view('/admin/supplier/edit', compact('supplier'));
    }

    public function editSupplier(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
            'alamat' => 'required|min:6',
            'no_hp' => 'required|min:10|numeric',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'alamat.required' => 'Harus Mengisi Bagian Alamat !',
            'alamat.min' => 'Minimal 6 Karakter !',
            'no_hp.required' => 'Harus Mengisi Bagian No Hp !',
            'no_hp.min' => 'Minimal 10 Karakter !',
            'no_hp.numeric' => 'Harus Pakai Nomer !',
        ]);
        supplier::where('id', $id)
                ->update([
                    'name'=>ucwords($request->name),
                    'alamat'=>ucwords($request->alamat),
                    'no_hp'=>$request->no_hp,
                ]);

    alert()->success('Data Berhasil Di Update !', 'Success');
    return redirect('/admin/supplier/index');
    }
}
