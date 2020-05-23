<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi_barang;
use App\barang;
use App\transaksi_detail;
use SweetAlert;
use Auth;
use Carbon\Carbon;
use PDF;



class DashboardPegawaiController extends Controller
{
    
    public function getTransaksi(){
        $barang = barang::all();
        $transaksi_detail = transaksi_detail::all();
        $transaksi_barang = transaksi_barang::where('status',0)->first();
        if(!empty($transaksi_barang))
        {
            $transaksi_detail  = transaksi_detail::where('transaksi_id', $transaksi_barang->id)->get();
            return view('/pegawai/index', compact('barang', 'transaksi_barang'  ,'transaksi_detail'));
        }
        return view('/pegawai/index', compact('barang', 'transaksi_barang'  ,'transaksi_detail'));
    }

    public function tampilKonfirmasi($id){
        $barang = barang::all();
        $transaksi_barang = transaksi_barang::where('id', $id)->first();
        $transaksi_detail = transaksi_detail::where('transaksi_id', $transaksi_barang->id)->get();

        
        return view('/pegawai/konfirmasi', compact('barang', 'transaksi_barang'  ,'transaksi_detail'));
    }

    public function cetak_pdf($id)
    {
        $barang = barang::all();
        $transaksi_barang = transaksi_barang::where('id', $id)->first();
        $transaksi_detail = transaksi_detail::where('transaksi_id', $transaksi_barang->id)->get();

            $pdf = PDF::loadview('/pegawai/transaksi_barang_pdf', compact('barang', 'transaksi_barang'  ,'transaksi_detail'));
            return $pdf->download('laporan-transaksi_barang-pdf.pdf');    
        //return $pdf->stream();
    }
    
         

    public function addTransaksi(Request $request){   
        //simpan ke database Transaksi
        $transaksi_barang = transaksi_barang::all();
        $transaksi_detail = transaksi_detail::where('barang_id', $request->barang)->first();
        $barang = barang::all();
        $tanggal = Carbon::now()->toDateTimeString();


        $this->validate($request, [
            'jumlah_beli' => 'required|numeric|min:1',
        ],
        [
            'jumlah_beli.required' => 'Inputan Jumlah Beli Harus Di Isi !',
            'jumlah_beli.numeric' => 'Harus Pakai Nomer !',
            'jumlah_beli.min' => 'Tidak Boleh Minus Atau Kosong !',
        ]);
        
        //Cek Validasi
        $cek_pesanan = transaksi_barang::where('status',0)->first();
        //Simpan Ke Database Transaksi
        if(empty($cek_pesanan)){
            $transaksi_barang = new transaksi_barang;
            $transaksi_barang->status        = 0;
            $transaksi_barang->jumlah_harga  = 0;
            $transaksi_barang->tanggal  = $tanggal;
            $transaksi_barang->save();
        }

        //Simpan Ke Database Transaksi_Detail
        //Cek Transaksi Detail
        
        $pesanan_baru = transaksi_barang::where('status',0)->first();

        $cek_pesanan_detail = transaksi_detail::where('barang_id', $request->barang)->where('transaksi_id', $pesanan_baru->id)->first();

        if(empty($cek_pesanan_detail)){
            $transaksi_detail = new transaksi_detail;
            $transaksi_detail->barang_id      = $request->barang;
            $transaksi_detail->transaksi_id   = $pesanan_baru->id;
            $transaksi_detail->jumlah_beli    = $request->jumlah_beli;
            $transaksi_detail->jumlah_harga   = $transaksi_detail->barang->harga*$request->jumlah_beli;
            $transaksi_detail->save();
        }else{
            $transaksi_detail = transaksi_detail::where('barang_id', $request->barang)->where('transaksi_id', $pesanan_baru->id)->first();
            $transaksi_detail->jumlah_beli    = $transaksi_detail->jumlah_beli + $request->jumlah_beli;
            
            // Harga Sekarang
            $harga_transaksi_detail_baru = $transaksi_detail->barang->harga*$request->jumlah_beli;
            $transaksi_detail->jumlah_harga   = $transaksi_detail->jumlah_harga+$harga_transaksi_detail_baru;
            $transaksi_detail->update();
        }

        //jumlah TOTAL
        $transaksi_barang = transaksi_barang::where('status',0)->first();
        $transaksi_barang->jumlah_harga = $transaksi_barang->jumlah_harga+$transaksi_detail->barang->harga*$request->jumlah_beli;
        $transaksi_barang->update();
        
        alert()->success('Transaksi Ditambah !', 'Success');
        return redirect('/pegawai/index');
    }

    public function deleteTransaksi($id)         
    {
        $transaksi_detail = transaksi_detail::where('id', $id)->first();
        $transaksi_barang = transaksi_barang::where('id', $transaksi_detail->transaksi_barang->id)->first();

        $transaksi_barang->jumlah_harga = $transaksi_barang->jumlah_harga-$transaksi_detail->jumlah_harga;
        $transaksi_barang->update();

        $transaksi_detail->delete();

        alert()->error('Transaksi Terhapus !', 'Deleted');
        return redirect('/pegawai/index');
        
    }

    public function konfirmasi(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pembeli' => 'required|regex:/^[\pL\s\-]+$/u',
            'uang_bayar' => 'required|min:1|numeric',
        ],
        [
            'nama_pembeli.required' => 'Inputan Nama Pembeli Harus Di Isi !',
            'nama_pembeli.regex' => 'Format Inputan Salah !',
            'uang_bayar.required' => 'Inputan Uang Bayar Harus Di Isi !',
            'uang_bayar.min' => 'Tidak Boleh Kosong atau Minus !',
            'uang_bayar.numeric' => 'Harus Pakai Nomer !',
        ]);

        $transaksi_barang = transaksi_barang::where('id', $id)->first();
        $transaksi_detail = transaksi_detail::where('transaksi_id', $transaksi_barang->id)->get();

        if($request->uang_bayar < $transaksi_barang->jumlah_harga){
            alert()->error('Uang Bayar Tidak Boleh Kurang !', 'Error');
            return redirect('pegawai/index');
        }
        
        $transaksi_barang = transaksi_barang::where('status',0)->first();
        $transaksi_id = $transaksi_barang->id;
        $transaksi_barang->status = 1;
        $transaksi_barang->nama_pembeli = $request->nama_pembeli;
        $transaksi_barang->uang_bayar = $request->uang_bayar;
        $transaksi_barang->update();

        $transaksi_detail = transaksi_detail::where('transaksi_id', $transaksi_id)->get();
        foreach($transaksi_detail as $transaksi_detail){
            $barang = barang::where('id', $transaksi_detail->barang_id)->first();
            $barang->stok = $barang->stok-$transaksi_detail->jumlah_beli;
            $barang->update();
        }



        alert()->success('Transaksi Sudah Selesai !', 'Success');
        return redirect('/pegawai/konfirmasi/'. $transaksi_barang->id);
    }

    public function detailTransaksi()
    {
        return redirect('/pegawai/konfirmasi');
    }
}
