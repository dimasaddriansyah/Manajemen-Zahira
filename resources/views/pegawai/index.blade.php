<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Pegawai | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/tampilan-admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/dash/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.addons.css')}}">
  <script src="{{ asset('js/app.js') }}"></script>
<!-- Menghitung Nominal Otomatis -->
  <script>
    function formatCurrency(num) {
      num = num.toString().replace(/\$|\,/g,'');
      if(isNaN(num))
      num = "0";
      sign = (num == (num = Math.abs(num)));
      num = Math.floor(num*100+0.50000000001);
      cents = num%100;
      num = Math.floor(num/100).toString();
      if(cents<10)
      cents = "0" + cents;
      for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
      num = num.substring(0,num.length-(4*i+3))+'.'+
      num.substring(num.length-(4*i+3));
      return (((sign)?'':'-') + 'Rp' + num);
    }
</script>
<!-- Menghitung Kembalian Otomatis -->
<script type="text/javascript">
    function startCalculate(){
        interval=setInterval("Calculate()",1);
    }
    function Calculate(){
        var a=document.form1.total_harga.value;
        var c=document.form1.uang_bayar.value;
        document.form1.uang_kembali.value=(c-a);
    }
    function stopCalc(){
        clearInterval(interval);
    }
</script>
</head>
<body>
    <nav class="navbar navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <li class="col-md-12">
                 <h3><i class="fa fa-cash-register" style="color: green"></i> Transaksi Pembelian</h3>
                </li>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          
          <li class="nav-item">
          <li class="col-md-12">
              <a class="mr-3"><i class="fa fa-user-alt"></i> {{ Auth::guard('pegawai')->user()->name }}</a>
              <a href="{{ url('/keluar') }}">Logout</a>
          </li>
          </li>
        </ul>
    </nav>

    <div class="content mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary float-left btn-lg mb-4" data-toggle="modal" data-target="#lihat_barang">
                        <i class="fa fa-plus"></i> Tambah Barang
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card">
                    <div class="card-header" style="background-color: #008080;">
                            <h5 style="color: white">
                                <i class="fa fa-info-circle"></i> 
                                Detail Transaksi : No - <i>
                                @if(!empty($transaksi_barang))
                                    {{$transaksi_barang->id}}
                                @endif
                            </i>
                            </h5>
                    </div>
                        <div class="card-body">
                            @if(!empty($transaksi_barang))
                            <table class="table table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Beli</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah Harga</th>
                                        <th><center>Option</center> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi_detail as $no => $transaksi_detail)
                                        <tr>
                                            <td>{{++$no}}</td>
                                            <td>{{$transaksi_detail->barang->name}}</td>
                                            <td>{{$transaksi_detail->jumlah_beli}} Pcs</td>
                                            <td>@currency($transaksi_detail->barang->harga)</td>
                                            <td>@currency($transaksi_detail->jumlah_harga)</td>
                                            <td>
                                                <center>
                                                <a href="{{url('/delete-transaksi/'.$transaksi_detail->id)}}" class="btn btn-xs btn-danger btn-flat" onclick="
                                                  return confirm('Anda Yakin Akan Menghapus Data ?');"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                                        <td>
                                            @if(!empty($transaksi_barang))
                                            <strong>@currency($transaksi_barang->jumlah_harga)</strong>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header" style="background: rgb(72,228,119);
                        background: linear-gradient(90deg, rgba(72,228,119,1) 0%, rgba(117,255,107,1) 100%);">
                            <h5 style="color: white"><i class="fas fa-check-double"></i> Konfirmasi Transaksi</h5>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger" align="left">
                                <ul>
                                  <p>Kesalahan !</p>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                          @endif
                          @if (!empty($transaksi_barang))
                          <form action="{{ url('/add-konfirmasi')}}/{{ $transaksi_barang->id }}" id="form1" name="form1" method="post">
                          @endif
                            @csrf
                                <div class="form-group">
                                    <label>Nama Pembeli</label>
                                    <input type="text" class="form-control @error('nama_pembeli') is-invalid @enderror" name="nama_pembeli" value="{{ old('nama_pembeli') }}">
                                    @if ($errors->has('nama_pembeli')) <span class="invalid-feedback"><strong>{{ $errors->first('nama_pembeli') }}</strong></span> @endif
                                </div>
                                <div class="form-group">
                                    <label>Total Harga</label>
                                        <input type="text" class="form-control" name="total_harga"  onfocus="startCalculate()" onblur="stopCalc()" 
                                        @if (!empty($transaksi_barang))
                                            value="@currency($transaksi_barang->jumlah_harga)" 
                                        @endif
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Uang Bayar</label>
                                    <input type="text" id="uang_bayar" class="form-control @error('uang_bayar') is-invalid @enderror" name="uang_bayar" value="{{old('uang_bayar')}}" onfocus="startCalculate()" onblur="stopCalc()" onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);" >Nominal : <span id="format"></span>
                                    @if ($errors->has('uang_bayar')) <span class="invalid-feedback"><strong>{{ $errors->first('uang_bayar') }}</strong></span> @endif
                                </div>
                                <button class="btn btn-success btn-flat btn-block btn-sm">Konfirmasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
  <div class="modal fade" id="lihat_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if ($errors->any())
            <div class="alert alert-danger" align="left">
                <ul>
                  <p>Kesalahan !</p>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <form action="{{url('/add-transaksi')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Nama Barang</label>
                <select name="barang" class="form-control">
                  @foreach($barang as $barang)
                    <option value="{{$barang->id}}">{{$barang->name}} | Stok : {{ $barang->stok }}</option>
                  @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Jumlah Beli</label>
                <input type="number" class="form-control @error('jumlah_beli') is-invalid @enderror" name="jumlah_beli" value="{{old('jumlah_beli')}}">
                @if ($errors->has('jumlah_beli')) <span class="invalid-feedback"><strong>{{ $errors->first('jumlah_beli') }}</strong></span> @endif
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    <script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>
@include('sweet::alert')

</body>
</html>
