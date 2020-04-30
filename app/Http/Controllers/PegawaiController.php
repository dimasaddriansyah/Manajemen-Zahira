<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\pegawai;
use Illuminate\Http\Request;
use SweetAlert;

class PegawaiController extends Controller
{
    public function tampilTambah(){

        return view('/admin/pegawai/tambah');
    }

    public function tampilEdit(){
        $pegawai = pegawai::All();

        return view('/admin/pegawai/edit', compact('pegawai'));
    }    

    public function getPegawai(){
        $pegawais = pegawai::paginate(5);

        return view('/admin/pegawai/index', compact('pegawais'));
    }

    public function searchPegawai(Request $request)
    {
        $cari = $request->get('cari');
        $pegawai = pegawai::where('name','LIKE','%'.$cari.'%')->get();
        return view('/admin/pegawai/index',compact('pegawai'));
    }

    public function addPegawai(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'alamat' => 'required|min:6',
            'no_hp' => 'required|min:10|numeric',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'email.required' => 'Harus Mengisi Bagian Email !',
            'password.required' => 'Harus Mengisi Bagian Password !',
            'password.min' => 'Minimal 6 Karakter !',
            'alamat.required' => 'Harus Mengisi Bagian Alamat !',
            'alamat.min' => 'Minimal 6 Karakter !',
            'no_hp.required' => 'Harus Mengisi Bagian No Hp !',
            'no_hp.min' => 'Minimal 10 Karakter !',
            'no_hp.numeric' => 'Harus Pakai Nomer !',
        ]);
        $pegawai = new pegawai();

        $pegawai->name = $request->name;
        $pegawai->email = $request->email;
        $pegawai->password = bcrypt($request->password);
        $pegawai->alamat = $request->alamat;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->save();

        alert()->success('Akun Berhasil Di Tambah !', 'Success');
        return redirect('/admin/pegawai/index');

        
    }

    public function deletePegawai($id){
        pegawai::where('id', $id)->delete();

        //alert()->message('BERHASIL DIHAPUSSSSS','<img src="/images/trash-solid.svg" width="200">')->html();
        alert()->message('<img src="/images/trash-solid.svg" width="90">', 'Terhapus !!')->html();
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
                'name'=>$request->name,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'no_hp'=>$request->no_hp,
            ]);

    alert()->success('Akun Berhasil Di Update !', 'Success');
    return redirect('/admin/pegawai/index');
    }
}
