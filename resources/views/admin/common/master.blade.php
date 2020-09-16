<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Simple Tables</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- daterange picker -->
  	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
  	<!-- iCheck for checkboxes and radio inputs -->
  	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  	<!-- Bootstrap Color Picker -->
  	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  	<!-- Tempusdominus Bbootstrap 4 -->
  	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  	<!-- Select2 -->
  	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/select2/css/select2.min.css') }}">
  	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  	<!-- Bootstrap4 Duallistbox -->
  	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  	<!-- SweetAlert2 -->
  	<link rel="stylesheet" href="{{ url('resources/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  	<!-- Toastr -->
  	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/toastr/toastr.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ url('resources/assets/admin/dist/css/adminlte.min.css') }}">
    <!-- Custom CSS -->
	<link rel="stylesheet" href="{{ url('resources/assets/admin/custom/css/custom.css') }}">
    @stack('custom-css')
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

	@include("admin.common.nav")
	@include("admin.common.aside")
	@yield("content")

<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('resources/assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ url('resources/assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ url('resources/assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ url('resources/assets/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('resources/assets/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ url('resources/assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ url('resources/assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('resources/assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ url('resources/assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('resources/assets/admin/dist/js/adminlte.min.js') }}"></script>
<!-- Bootstrap JS For Flash Messages -->
<script src="{{ url('resources/assets/admin/dist/js/adminlte.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ url('resources/assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ url('resources/assets/admin/plugins/toastr/toastr.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ url('resources/assets/admin/custom/js/custom.js') }}"></script>
<!-- Custom JS For Single Page-->
@stack('custom-js')
<!-- Page script -->
<script type="text/javascript">
	
</script>

</body>
</html>