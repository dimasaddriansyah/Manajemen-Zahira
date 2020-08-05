<?php

namespace App\Http\Controllers;

use App\pegawai;
use Illuminate\Http\Request;
use SweetAlert;


class PegawaiController extends Controller
{
    public function tampilTambah(){

        return view('/admin/pegawai/tambah');
    }

    public function getPegawai(){
        $pegawais = pegawai::all();

        return view('/admin/pegawai/index', compact('pegawais'));
    }

    public function addPegawai(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:pegawai|min:4|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:pegawai|email',
            'password' => 'required|min:6',
            'alamat' => 'required|min:6',
            'no_hp' => 'required|min:10|numeric|unique:pegawai',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.unique' => 'Nama Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'email.required' => 'Harus Mengisi Bagian Email !',
            'email.unique' => 'Email Sudah Terdaftar !',
            'password.required' => 'Harus Mengisi Bagian Password !',
            'password.min' => 'Minimal 6 Karakter !',
            'alamat.required' => 'Harus Mengisi Bagian Alamat !',
            'alamat.min' => 'Minimal 6 Karakter !',
            'no_hp.required' => 'Harus Mengisi Bagian No Hp !',
            'no_hp.min' => 'Minimal 10 Karakter !',
            'no_hp.numeric' => 'Harus Pakai Nomer !',
            'no_hp.unique' => 'No Hp Sudah Terdaftar !',

        ]);
        $pegawai = new pegawai();

        $pegawai->name = ucwords($request->name);
        $pegawai->email = $request->email;
        $pegawai->password = bcrypt($request->password);
        $pegawai->alamat = ucwords($request->alamat);
        $pegawai->no_hp = $request->no_hp;
        $pegawai->save();

        alert()->success('Data Berhasil Di Simpan','Success');
        return redirect('/admin/pegawai/index');
    }

    public function deletePegawai($id){
        pegawai::where('id', $id)->delete();

        alert()->error('Data Terhapus','Deleted');
        return redirect('/admin/pegawai/index');
    }

    public function formPegawai($id){
        $pegawai = pegawai::where('id', $id)->first();
        return view('/admin/pegawai/edit', compact('pegawai'));
    }
    public function editPegawai(Request $request,$id){
    $this->validate($request, [
        'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
        'email' => 'required|email',
        'alamat' => 'required|min:6',
        'no_hp' => 'required|min:10|numeric',
    ],
    [
        'name.required' => 'Harus Mengisi Bagian Nama !',
        'name.min' => 'Minimal 4 Karakter !',
        'name.regex' => 'Inputan Nama Tidak Valid !',
        'email.required' => 'Harus Mengisi Bagian Email !',
        'alamat.required' => 'Harus Mengisi Bagian Alamat !',
        'alamat.min' => 'Minimal 6 Karakter !',
        'no_hp.required' => 'Harus Mengisi Bagian No Hp !',
        'no_hp.min' => 'Minimal 10 Karakter !',
        'no_hp.numeric' => 'Harus Pakai Nomer !',
    ]);
    pegawai::where('id', $id)
            ->update([
                'name'=>ucwords($request->name),
                'email'=>$request->email,
                'alamat'=>ucwords($request->alamat),
                'no_hp'=>$request->no_hp,
            ]);

    alert()->success('Data Berhasil Di Update','Success');
    return redirect('/admin/pegawai/index');
    }
}
