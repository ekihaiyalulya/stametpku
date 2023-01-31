<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administartor Meteorologi SSK II</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  @yield('css')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home" class="brand-link">
        <img src="{{ url('dist/img/bmkglogo.png') }}" alt="Administartor BMKG" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Administartor BMKG</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('berita.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Berita
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pegawai.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('struktur.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Struktur
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kahutla.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Kahutla
                </p>
              </a>
            </li>
            
            
            @if (Route::has('register'))
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                {{ __('Register') }}
                </p>
              </a>
            </li>
            @endif
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>


      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        &copy; 2022
      </div>
      <!-- Default to the left -->
      <strong>Powered by &copy; <a >Stasiun Meteorologi Kelas I SSK II</a></strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
  @yield('js')

</body>

</html>