<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPegawaiController extends Controller
{
    public function index(){
        $title = 'Dashboard Pegawai';
 
        return view('/pegawai/index',compact('title'));
    }
}
