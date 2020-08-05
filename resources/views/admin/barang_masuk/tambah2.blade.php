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

  <title>Admin | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/tampilan-admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/tampilan-admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/dash/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.addons.css')}}">
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
      return (((sign)?'':'-') + 'Rp. ' + num);
    }
</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
      <li class="col-md-12">
        <a href="{{ url('/keluar') }}">Logout</a>
      </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/tampilan-admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Toko Zahira</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/tampilan-admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="color : white;" >
          {{ Auth::guard('admin')->user()->name }}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/admin/index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon nav-icon fas fa-scroll"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left" ></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/pegawai/index') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>Akun Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/supplier/index') }}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Data Supplier</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon nav-icon fas fa-scroll"></i>
              <p>
                Master Barang
                <i class="right fas fa-angle-left" ></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/barang/index') }}" class="nav-link ">
                  <i class="nav-icon fas fa-cubes"></i>
                  <p>Stok Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/kategori/index') }}" class="nav-link ">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Kategori Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/barang_masuk/index') }}" class="nav-link active">
                  <i class="nav-icon fas fa-arrow-circle-right"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
              <a href="{{ url('/admin/transaksi/index') }}" class="nav-link">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>
                  Laporan Transaksi
                </p>
              </a>
            </li>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/keuangan/index') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Laporan Keuangan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ url('/admin/barang_masuk/index')}}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
            </div>
              <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h5><i class="fa fa-plus"></i>  TAMBAH DATA BARANG MASUK</h5>
                        </div>
                        <div class="col-12">
                        <div class="card-body">
                            <form action="{{ url('/add-barang_masuk2') }}" method="post">
                                @csrf
                                <div class="form-group">
                                  <label>Nama Supplier</label>
                                  <select name="supplier" class="form-control @error ('supplier') is-invalid @enderror">
                                    <option value="">- Pilih -</option>
                                    @foreach($supplier as $supplier)
                                      <option value="{{$supplier->id}}" {{ old('supplier') == $supplier->id ? 'selected' : null }}>{{$supplier->name}}</option>
                                    @endforeach
                                  </select>
                                    @if ($errors->has('supplier')) <span class="invalid-feedback"><strong>{{ $errors->first('supplier') }}</strong></span> @endif

                              </div>
                              <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" style="text-transform: capitalize;">
                                @if ($errors->has('nama_barang')) <span class="invalid-feedback"><strong>{{ $errors->first('nama_barang') }}</strong></span> @endif
                            </div>
                            <div class="form-group">
                                <label>Kategori Barang</label>
                                <select name="kategori" class="form-control @error ('kategori') is-invalid @enderror">
                                  <option value="">- Pilih -</option>
                                  @foreach($kategori as $kategori)
                                      <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                              <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="num" name="harga_beli" value="{{ old('harga_beli') }}" onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);">Nominal : <span id="format"></span>
                                @if ($errors->has('harga_beli')) <span class="invalid-feedback"><strong>{{ $errors->first('harga_beli') }}</strong></span> @endif
                            </div>
                               <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="num" name="harga_jual" value="{{ old('harga_jual') }}" onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);">Nominal : <span id="format2"></span>
                                @if ($errors->has('harga_jual')) <span class="invalid-feedback"><strong>{{ $errors->first('harga_jual') }}</strong></span> @endif
                            </div>
                            <div class="form-group">
                                <label>Jumlah Barang</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}">
                                @if ($errors->has('jumlah')) <span class="invalid-feedback"><strong>{{ $errors->first('jumlah') }}</strong></span> @endif
                            </div>
                                <button class="btn btn-primary btn-flat btn-block btn-sm">Add data</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>

@yield('script')
</body>
</html>
