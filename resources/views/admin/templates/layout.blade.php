<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{!! url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! url('public/admin/bower_components/font-awesome/css/font-awesome.min.css') !!}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{!! url('public/admin/bower_components/Ionicons/css/ionicons.min.css') !!}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{!! url('public/admin/bower_components/jvectormap/jquery-jvectormap.css') !!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! url('public/admin/dist/css/AdminLTE.min.css') !!}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{!! url('public/admin/dist/css/skins/_all-skins.min.css') !!}">
  <link rel="stylesheet" href="{!! url('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script type="text/javascript">
        function xacnhanxoa(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin.templates.elements.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.templates.elements.leftsidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('controller')
        <small>@yield('action')</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li><a href="#">@yield('controller')</a></li>
      </ol>
    </section>
    <div class="col-lg-12" style="margin-top:12px;"> 
                        @if(Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                    </div>
  @yield('content')
</div>
  <!-- /.content-wrapper -->

  @include('admin.templates.elements.footer')

  <!-- Control Sidebar -->
  @include('admin.templates.elements.sidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{!! url('public/admin/bower_components/jquery/dist/jquery.min.js') !!}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{!! url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! url('public/admin/bower_components/fastclick/lib/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! url('public/admin/dist/js/adminlte.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! url('public/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}"></script>
<!-- jvectormap  -->
<script src="{!! url('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! url('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<!-- SlimScroll -->
<script src="{!! url('public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
<!-- ChartJS -->
<script src="{!! url('public/admin/bower_components/Chart.js/Chart.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! url('public/admin/dist/js/pages/dashboard.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! url('public/admin/dist/js/demo.js') !!}"></script>
<script src="{!! url('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! url('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
<script>
  $(function () {
    $('#tablesl').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#tableorder').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  
</script>
@yield('js')
</body>
</html>
