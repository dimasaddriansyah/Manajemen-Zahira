<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\pegawai;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class login extends Controller
{
    public function index(){
        $title = 'Menu Login';
 
        return view('/masuk',compact('title'));
    }

    function masuk(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            alert()->message('Selamat Datang !')->autoclose(2500);

            return redirect()->intended('/admin/index');
        }else if (Auth::guard('pegawai')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/pegawai/index');
        }else{
            //Gagal Login
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
