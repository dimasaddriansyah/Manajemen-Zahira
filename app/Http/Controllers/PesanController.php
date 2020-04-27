<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pesanan;
use App\PesananDetail;
use App\User;
use Auth;
use Carbon\Carbon;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();

        return view('pesan.index', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah MELEBIHI STOK
        if($request->jumlah_pesan > $barang->stok){
            return redirect('pesan/'.$id);
        }

        //cek VALIDASI
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        //simpan ke database PESANAN
        if(empty($cek_pesanan)){
            $pesanan = new Pesanan;
            $pesanan->user_id       = Auth::user()->id;
            $pesanan->tanggal       = $tanggal;
            $pesanan->status        = 0;
            $pesanan->jumlah_harga  = 0;
            $pesanan->kode          = mt_rand(100, 999);
            $pesanan->save();
        }

        //simpan ke database PESANAN_DETAIL
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //cek PESANAN DETAIL
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id      = $barang->id;
            $pesanan_detail->pesanan_id     = $pesanan_baru->id;
            $pesanan_detail->jumlah         = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga   = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->save();
        }else{
            $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah         = $pesanan_detail+$request->jumlah_pesan;

            //HARGA SEKARANG
            $harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga   = $pesanan_detail->$jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah TOTAL
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
        $pesanan->update();
        
        //Alert::success('Pesanan Sukses Masuk Keranjang', 'Success');
        return redirect('check-out');
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(!empty($pesanan))
        {
            $pesanan_details  = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
        }
    }

    public function delete($id)         
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();
        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan->id)->first();

        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        return redirect('check-out');
        
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();
           
        if(empty($user->alamat)){
            //Allert::error('Identitas Harus Dilengkapi !!!', 'Eror');
            return redirect('profile');
        }if(empty($user->alamat)){
            //Allert::error('Identitas Harus Dilengkapi !!!', 'Eror');
            return redirect('profile');
        }
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail){
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_detail->jumlah;
            $barang->update();
        }
        //Alert::success('Pesanan Suskses Check Out Silahkan Bayar', 'Success');
        return redirect('history/'.$pesanan->id);
    }
}
