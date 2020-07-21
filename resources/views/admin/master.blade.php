<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Project Management </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset ('assets/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset ('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset ('assets/plugins/summernote/summernote-bs4.css') }} ">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <h3 class="m-0 text-dark ml-5">
      @yield('pagetitle')
    </h3>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
         
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light"> Project Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- User -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          

          <li class="nav-item">
          <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ Request()->routeIs('admin.dashboard.index') ? 'active' : ' ' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>


          <li class="nav-item has-treeview {{ Request()->routeIs('admin.project.all', 'admin.project.new') ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ Request()->routeIs('admin.project.all', 'admin.project.new') ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Project
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
                <li class="nav-item">
                  <a href="{{ route ('admin.project.all') }}" class="nav-link {{ Request()->routeIs('admin.project.all') ? 'active' : ' ' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Project</p>
                  </a>
                </li>


              <li class="nav-item">
                <a href="{{ route ('admin.project.new') }}" class="nav-link {{ Request()->routeIs('admin.project.new') ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item has-treeview {{ Request()->routeIs('admin.writer.all', 'admin.writer.new') ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ Request()->routeIs('admin.writer.all', 'admin.writer.new') ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Writer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
                <li class="nav-item">
                  <a href="{{ route ('admin.writer.all') }}" class="nav-link {{ Request()->routeIs('admin.writer.all') ? 'active' : ' ' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Writer</p>
                  </a>
                </li>


              <li class="nav-item">
                <a href="{{ route ('admin.writer.new') }}" class="nav-link {{ Request()->routeIs('admin.writer.new') ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview {{ Request()->routeIs('admin.article.all', 'admin.article.new') ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link {{ Request()->routeIs('admin.article.all', 'admin.article.new') ? 'active' : ' ' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Article
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
                <li class="nav-item">
                  <a href="{{ route ('admin.article.all') }}" class="nav-link {{ Request()->routeIs('admin.article.all') ? 'active' : ' ' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Article</p>
                  </a>
                </li>


              <li class="nav-item">
                <a href="{{ route ('admin.article.new') }}" class="nav-link {{ Request()->routeIs('admin.article.new') ? 'active' : ' ' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>

            </ul>
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
    
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          @yield('pagecontent')
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href=""> </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset ('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset ('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset ('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset ('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset ('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset ('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset ('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset ('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset ('assets/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('assets/dist/js/pages/dashboard.js') }} dist/js/demo.js"></script>

<script type="text/javascript">
   //Date range picker
  $('#reservation').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY'
      }
    })
</script>

<!-- Summernote -->
<script>
  $(function () {
    // Summernote
    $('#compose-textarea').summernote({
      height: '500px'
    })
  })

  
</script>

</body>
</html>
