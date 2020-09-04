<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="{{ url('resources/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ url('resources/assets/admin/dist/css/adminlte.min.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('resources/assets/admin/images/login.jpg');">
	<div class="login-box">
		
		<div class="login-logo">
			<a href="" style="color:#fff"><b>Admin</b>Login</a>
		</div>

		@if(Session::has('message'))
		<div class="card-body">
	  		<div class="alert alert-danger alert-dismissible">
	  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  			<h5><i class="icon fas fa-ban"></i> {{ Session::get('message') }}</h5>
	  		</div>
	  	</div>
  		@endif

		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<form action="" method="post">
					@csrf
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					@error('username')
      					<li class="text-danger">{{ $message }}</li>
    				@enderror
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					@error('password')
      					<li class="text-danger">{{ $message }}</li>
    				@enderror
					<div class="row">
						<div class="col-8"></div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-info btn-sm">Sign In &nbsp;<i class="fas fa-sign-in-alt"></i></button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="{{ url('resources/assets/admin/plugins/jquery/jquery.min.js') }}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{ url('resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ url('resources/assets/admin/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
