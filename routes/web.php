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
    Route::get('/form-pegawai/{id}', 'PegawaiController@formPegawai');
    Route::post('/edit-pegawai/{id}', 'PegawaiController@editPegawai');
    Route::get('/delete-pegawai/{id}', 'PegawaiController@deletePegawai');
    Route::get('/cari', 'PegawaiController@cari');

    //Data Supplier
    Route::get('/admin/supplier/index', 'SupplierController@getSupplier');
    Route::get('/admin/supplier/tambah', 'SupplierController@tampilTambah');
    Route::post('/add-supplier', 'SupplierController@addSupplier');
    Route::get('/form-supplier/{id}', 'SupplierController@formSupplier');
    Route::post('/edit-supplier/{id}', 'SupplierController@editSupplier');
    Route::get('/delete-supplier/{id}', 'SupplierController@deleteSupplier');

    //Data Kategori Barang
    Route::get('/admin/kategori/index', 'KategoriController@getKategori');
    Route::get('/admin/kategori/tambah', 'KategoriController@tampilTambah');
    Route::post('/add-kategori', 'KategoriController@addKategori');
    Route::get('/form-kategori/{id}', 'KategoriController@formKategori');
    Route::post('/edit-kategori/{id}', 'KategoriController@editKategori');
    Route::get('/delete-kategori/{id}', 'KategoriController@deleteKategori');

    //Data Barang
    Route::get('/admin/barang/index', 'BarangController@getBarang');
    Route::get('/admin/barang/tambah', 'BarangController@tampilTambah');
    Route::post('/add-barang', 'BarangController@addBarang');
    Route::get('/form-barang/{id}', 'BarangController@formBarang');
    Route::post('/edit-barang/{id}', 'BarangController@editBarang');
    Route::get('/delete-barang/{id}', 'BarangController@deleteBarang');

    //Data Barang Masuk
    Route::get('/admin/barang_masuk/index', 'BarangMasukController@getBarangMasuk');
    Route::get('/admin/barang_masuk/tambah', 'BarangMasukController@tampilTambah');
    Route::post('/add-barang_masuk', 'BarangMasukController@addBarangMasuk');
    Route::get('/form-barang_masuk/{id}', 'BarangMasukController@formBarangMasuk');
    Route::post('/edit-barang_masuk/{id}', 'BarangMasukController@editBarangMasuk');
    Route::get('/delete-barang_masuk/{id}', 'BarangMasukController@deleteBarangMasuk');

    //Laporan Barang Masuk
    Route::get('/admin/lp_barang_masuk/index', 'LPMasukController@Index');

    //Laporan Barang Keluar
    Route::get('/admin/lp_barang_keluar/index', 'LPKeluarController@Index');

});

Route::group(['middleware'=>'auth:pegawai'],function(){
 
    Route::get('/pegawai/index','DashboardPegawaiController@index'); 
});

Route::group(['middleware'=>'guest'],function(){
 
    Route::get('/masuk','login@index'); 
    Route::post('/kirimdata', 'login@masuk');
    
});

Route::get('/keluar', 'login@keluar');



