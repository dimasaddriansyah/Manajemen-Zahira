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
  <link rel="stylesheet" href="{{url('/tampilan-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  
  @yield('style-ajalah')

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
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon nav-icon fas fa-scroll"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left" ></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/pegawai/index') }}" class="nav-link ">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>Akun Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/supplier/index') }}" class="nav-link active">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Data Supplier</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
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
                <a href="{{ url('/admin/barang_masuk/index') }}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-circle-right"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
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
                <div class="row">
                  <div class="col">
                    <a class="btn btn-primary" data-toggle="modal"
                    data-target="#tambahsupplier"><i class="fa fa-plus p-r-5">  TAMBAH DATA</i></a>
                  </div>
                </div>
              </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                          <table class="table table-bordered" id="supplier-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                </tr>
                            </thead>
                        </table>
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

<!-- Modal from transaksi -->
<div id="tambahsupplier" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Tambah Data Supplier</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body mt-3">
              <form action="{{ url('/add-supplier') }}" method="post">
                  @csrf
                  <div class="form-group">
                      <label for="name">Nama Supplier</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" style="text-transform: capitalize;" value="{{old('name')}}">
                      @if ($errors->has('name')) <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span> @endif
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" style="text-transform: capitalize;" value="{{old('alamat')}}">
                    @if ($errors->has('alamat')) <span class="invalid-feedback"><strong>{{ $errors->first('alamat') }}</strong></span> @endif
                  </div>
                  <div class="form-group">
                      <label for="no_hp">No Hp</label>
                      <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{old('no_hp')}}">
                      @if ($errors->has('no_hp')) <span class="invalid-feedback"><strong>{{ $errors->first('no_hp') }}</strong></span> @endif
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-success">Add data</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
<!-- end modal daftar -->


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{url('/tampilan-admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('/tampilan-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript">
  $(function() {
      var oTable = $('#supplier-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url: '{{ url("admin/supplier/index/json") }}'
          },
          columns: [
          {data: 'name', name: 'name'},
          {data: 'alamat', name: 'alamat'},
          {data: 'no_hp', name: 'no_hp'},
      ],
      });
  });
</script>
@include('sweet::alert')
</body>
</html>