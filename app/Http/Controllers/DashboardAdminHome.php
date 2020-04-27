<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminHome extends Controller
{
    public function index(){
        $title = 'Dashboard Admin';
 
        return view('/admin/index',compact('title'));
    }
}
