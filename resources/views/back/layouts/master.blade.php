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

  <title>Money_Wallet | Admin_Panel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link text-center">
      <span class="brand-text font-weight-light">Money_Wallet</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://ui-avatars.com/api/?background=random&name={{ auth()->guard('admin_user')->user()->name }}" class="img-circle elevation-2" alt="User-Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.home') }}" class="d-block">{{ auth()->guard('admin_user')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link @yield('dashboard')"><i class="nav-icon fa fa-tachometer-alt"></i><p>Dashboard</p></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user') }}" class="nav-link @yield('user')"><i class="nav-icon fas fa-users"></i><p>Users</p></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.contact') }}" class="nav-link  @yield('contact')"><i class="nav-icon fas fa-address-book"></i><p>Contact</p></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.wallet') }}" class="nav-link @yield('wallet')"><i class="nav-icon fas fa-wallet"></i><p>Wallet</p></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.currency') }}" class="nav-link @yield('currency')"><i class="nav-icon fas fa-dollar-sign"></i><p>Currency</p></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="nav-icon fas fa-history"></i><p>History</p></a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <a class="btn btn-sm btn-warning" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date("Y") }} <a href="{{ route('admin.home') }}">moneywallet-community</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@stack('script-alt')
</body>
</html>
