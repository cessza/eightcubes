<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{url('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('../plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{url('../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{url('../plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{url('../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{url('../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('../plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('../plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('../dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('../plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('../plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('../plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>Admins Panel Page</title>
</head>
<body>
<div class="wrapper">
    @include('layouts.admin_layout.admin_nav')

    @include('layouts.admin_layout.admin_sidebar')

    @yield('content')
</div>
<!--/wrapper-->

  <!-- jQuery -->
<script src="{{ url('../plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('../plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('../plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('../plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('../plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('../plugins/moment/moment.min.js')}}"></script>
<script src="{{url('../plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('../plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('../dist/js/adminlte.js')}}"></script>
<!--custom admin js-->
<script src="{{url('../plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('../plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('../plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"></script>

<!-- Select2 -->
<script src="{{url('../plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $('.select2').select2();
</script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{url('../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{url('../plugins/moment/moment.min.js')}}"></script>
<script src="{{url('../plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('../dist/js/adminlte.min.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('../dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('../dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#categories").DataTable();
    $("#subcategories").DataTable();
    $("#products").DataTable();
  });
</script>
<script src="{{url('../dist/js/admin_script.js')}}"></script>
<!--sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Sparkline -->
<script src="{{ url('../plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('../plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('../plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>


</body>
</html>