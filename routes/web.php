<?php

use Illuminate\Support\Facades\Route;

Route::get('/coba', function () {

    return view('pegawai.cari');
});

Auth::routes();

Route::get('/', function () {

    return view('welcome');
});

Route::group(['middleware'=>'auth:admin'],function(){

    Route::get('/admin/index', 'DashboardAdmin@tampil');

    //Data Pegawai
    Route::get('/admin/pegawai/index', 'PegawaiController@getPegawai');
    Route::get('/admin/pegawai/tambah', 'PegawaiController@tampilTambah');
    Route::post('/add-pegawai', 'PegawaiController@addPegawai');
    Route::get('/form-pegawai/{id}', 'PegawaiController@formPegawai');
    Route::post('/edit-pegawai/{id}', 'PegawaiController@editPegawai');
    Route::get('/delete-pegawai/{id}', 'PegawaiController@deletePegawai');

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
    Route::get('/admin/barang/index', 'BarangMasukController@getBarang');
    Route::get('/admin/barang_masuk/index', 'BarangMasukController@getBarangMasuk');
    Route::get('/admin/barang_masuk/tambah', 'BarangMasukController@tampilTambah');
    Route::post('/add-barang_masuk', 'BarangMasukController@addBarangMasuk');
    Route::get('/form-barang_masuk/{id}', 'BarangMasukController@formBarangMasuk');
    Route::post('/edit-barang_masuk/{id}', 'BarangMasukController@editBarangMasuk');
    Route::get('/delete-barang/{id}', 'BarangMasukController@deleteBarang');
    Route::get('/admin/barang_masuk/tambah2', 'BarangMasukController@tampilTambah2');
    Route::post('/add-barang_masuk2', 'BarangMasukController@addBarangMasuk2');
    Route::get('/form-add-stok/{id}', 'BarangMasukController@tampilAddStok');
    Route::post('/add-stok/{id}', 'BarangMasukController@AddStok');

    //Laporan Laporan Transaksi
    Route::get('/admin/transaksi/index', 'TransaksiController@getTransaksi');

    //Keuangan
    Route::get('/admin/keuangan/index', 'KeuanganController@getKeuangan');
});

Route::group(['middleware'=>'auth:pegawai'],function(){

    Route::get('/pegawai/index','DashboardPegawaiController@getTransaksi');
    Route::post('/add-transaksi', 'DashboardPegawaiController@addTransaksi');
    Route::get('/delete-transaksi/{id}', 'DashboardPegawaiController@deleteTransaksi');
    Route::get('/pegawai/konfirmasi/{id}', 'DashboardPegawaiController@tampilKonfirmasi');
    Route::post('/add-konfirmasi/{id}', 'DashboardPegawaiController@konfirmasi');
    Route::get('/cetak_pdf/{id}', 'DashboardPegawaiController@cetak_pdf');
});

Route::group(['middleware'=>'guest'],function(){

    Route::get('/masuk','login@index');
    Route::post('/kirimdata', 'login@masuk');

});

Route::get('/keluar', 'login@keluar');



