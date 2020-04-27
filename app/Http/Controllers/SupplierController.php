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

        return redirect('/admin/supplier/index');

        
    }

    public function deletesupplier($id){
        supplier::where('id', $id)->delete();

        return redirect('/admin/supplier/index');
    }

    public function formsupplier($id){
        $supplier = supplier::where('id', $id)->first();

        return view('/halaman-admin/content/edit', compact('supplier'));
    }

    public function editsupplier(Request $request,$id){
        supplier::where('id', $id)
                ->update([
                    'nama'=>$request->nama,
                    'harga'=>$request->harga,
                    'stok'=>$request->stok,
                    'keterangan'=>$request->keterangan,
                ]);

    return redirect('/halaman-admin/content/supplier');
    }
}
