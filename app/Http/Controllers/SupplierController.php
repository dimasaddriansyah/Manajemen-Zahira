<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supplier;

class SupplierController extends Controller
{
    
    public function tampilTambah(){
        return view('/admin/supplier/tambah');
    }

    public function getSupplier(){
        $supplier = supplier::All();

        return view('/admin/supplier/index', compact('supplier'));
        // echo $supplier;
    }

    public function addSupplier(Request $request){
        $supplier = new supplier();

        $supplier->name = $request->name;
        $supplier->alamat = $request->alamat;
        $supplier->no_hp = $request->no_hp;
        $supplier->save();

        alert()->success('Data Berhasil Di Tambah !', 'Success');
        return redirect('/admin/supplier/index');

        
    }

    public function deletesupplier($id){
        supplier::where('id', $id)->delete();

        alert()->error('Data Berhasil Di Hapus !', 'Hapus');
        return redirect('/admin/supplier/index');
    }

    public function formSupplier($id){
        $supplier = supplier::where('id', $id)->first();

        return view('/admin/supplier/edit', compact('supplier'));
    }

    public function editSupplier(Request $request,$id){
        supplier::where('id', $id)
                ->update([
                    'name'=>$request->name,
                    'alamat'=>$request->alamat,
                    'no_hp'=>$request->no_hp,
                ]);

    alert()->success('Data Berhasil Di Update !', 'Success');
    return redirect('/admin/supplier/index');
    }
}
