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
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/tampilan-admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/dash/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('tampilan-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <script src="{{ asset('js/app.js') }}"></script>



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
                <a href="{{ url('/admin/barang/index') }}" class="nav-link active">
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
                    <?php
                        $notif = \App\barang::where('status');

                        if(!empty($notif)){
                            $k = \App\barang::where('status',2)->count();

                        }
                        if(!empty($notif)) {
                            $h = \App\barang::where('status',1)->count();
                        }
                    ?>
                    <a class="btn btn-primary" style="color: white"><i class="fas fa-cubes"></i> Stok Barang</a>
                    @if (!empty($h))
                        <a class="btn btn-danger" style="color: white"><i class="fas fa-ban"></i> Stok Habis <b>{{ $h }}</b></a>
                    @endif
                    @if (!empty($k))
                        <a class="btn btn-warning" style="color: white"><i class="fas fa-exclamation-triangle"></i> Stok Kritis <b>{{ $k }}</b></a>
                    @endif
                  </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori Barang</th>
                                        <th><center>Stok</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Update</center></th>
                                        <th><center>Option</center> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $barang)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$barang->nama_barang}}</td>
                                            <td>{{$barang->kategori->name}}</td>
                                            <th><center>{{$barang->stok}}</center></th>
                                            <td>
                                              <center>
                                              @if($barang->stok <= 0)
                                                <span class="badge badge-danger">Habis</span><br>
                                                <span class="badge btn-outline-danger"><i class="fas fa-pencil-alt"></i> Tambah Stok Sekarang</span>
                                              @elseif($barang->stok < 5)
                                                <span class="badge badge-warning">Kritis</span>
                                              @else
                                                <span class="badge badge-success">Aman</span>
                                              @endif
                                              </center>
                                            </td>
                                            <td align="center"><b>{{$barang->updated_at}}</b></td>
                                            <td>
                                                <center>
                                                <a href="{{url('/delete-barang/'.$barang->id)}}" class="btn btn-xs btn-danger btn-flat" onclick="
                                                  return confirm('Anda Yakin Akan Menghapus Data ?');"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
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

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('tampilan-admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('tampilan-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@include('sweet::alert')
@yield('script')
</body>
</html>
