<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth:admin'],function(){
 
    Route::get('/admin/index','DashboardAdminHome@index');

    //Menghitung Data di Dashboard
    Route::get('/admin/index', 'DashboardAdmin@tampil');

    //Data Pegawai
    Route::get('/admin/pegawai/index', 'PegawaiController@getPegawai');
    Route::get('/admin/pegawai/tambah', 'PegawaiController@tampilTambah');
    Route::post('/add-pegawai', 'PegawaiController@addPegawai');
    Route::get('/delete-pegawai/{id}', 'PegawaiController@deletePegawai');
    Route::get('/admin/pegawai/edit', 'PegawaiController@tampilEdit');
    Route::post('/edit-pegawai/{id}', 'PegawaiController@editPegawai');
    Route::get('/search', 'PegawaiController@Search');



    //Data Supplier
    Route::get('/admin/supplier/index', 'SupplierController@getSupplier');
    Route::get('/admin/supplier/tambah', 'SupplierController@tampilTambah');
    Route::post('/add-supplier', 'SupplierController@addSupplier');
    Route::get('/delete-supplier/{id}', 'SupplierController@deleteSupplier');

    //Data Kategori Barang
    Route::get('/admin/kategori/index', 'KategoriController@getKategori');
    Route::get('/admin/kategori/tambah', 'KategoriController@tampilTambah');
    Route::post('/add-kategori', 'KategoriController@addKategori');
    Route::get('/delete-kategori/{id}', 'KategoriController@deleteKategori');

    //Data Barang
    Route::get('/admin/barang/index', 'BarangController@getBarang');
    Route::get('/admin/barang/tambah', 'BarangController@tampilTambah');
    Route::post('/add-barang', 'BarangController@addBarang');
    Route::get('/delete-barang/{id}', 'BarangController@deleteBarang');

    //Data Barang Masuk
    Route::get('/admin/barang_masuk/index', 'BarangMasukController@getBarangMasuk');
    Route::get('/admin/barang_masuk/tambah', 'BarangMasukController@tampilTambah');
    Route::post('/add-barang_masuk', 'BarangMasukController@addBarangMasuk');
    Route::get('/delete-barang_masuk/{id}', 'BarangMasukController@deleteBarangMasuk');




    



 
});

Route::group(['middleware'=>'auth:pegawai'],function(){
 
    Route::get('/pegawai/index','DashboardPegawaiController@index'); 
});

Route::group(['middleware'=>'guest'],function(){
 
    Route::get('/masuk','login@index'); 
    Route::post('/kirimdata', 'login@masuk');
    
});

Route::get('/keluar', 'login@keluar');



