<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\pegawai;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class login extends Controller
{
    public function index(){
 
        return view('/masuk');
    }

    function masuk(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            toast('Anda Sebagai Admin','info');

            return redirect()->intended('/admin/index');
        }else if (Auth::guard('pegawai')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/pegawai/index');
        }else{
            //Gagal Login
            alert()->error('Gagal Login', 'Error');
            return redirect('/masuk')->with('alert','Password atau Email, Salah !');
        }
    }

    function keluar()
    {   
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }else if(Auth::guard('pegawai')->check()){
            Auth::guard('pegawai')->logout();
        }
        return redirect('/masuk')->with('alert','Kamu sudah logout'); 
    }
}
