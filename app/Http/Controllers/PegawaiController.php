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
        // echo $Pegawai;
    }    

    public function getPegawai(){
        $pegawais = pegawai::paginate(5);

        return view('/admin/pegawai/index', compact('pegawais'));
        // echo $Pegawai;
    }

    public function Search(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$pegawais = DB::table('pegawai')
		->where('name','like',"%".$cari."%")
		->paginate(5);

    		// mengirim data pegawai ke view index
		return view('/admin/pegawai/index',['pegawai' => $pegawais]);

	}

    public function addPegawai(Request $request){
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

        alert()->error('Akun Berhasil Di Hapus !', 'Delete');
        return redirect('/admin/pegawai/index');
    }

    public function editPegawai(Request $request,$id){
        pegawai::where('id', $id)
                ->update([
                    'nama'=>$request->name,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->pssword),
                    'alamat'=>$request->alamat,
                    'no_hp'=>$request->no_hp,
                ]);

    return redirect('/admin/pegawai/index');
    }
}
