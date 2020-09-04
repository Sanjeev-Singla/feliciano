@extends("public.common.master")
@section("content")

<section class="hero-wrap hero-wrap-2" style="background-image: url('resources/assets/public/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center mb-4">
				<h1 class="mb-2 bread">Registration</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Registration <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section" style="margin: 30px 0 30px 0;">
	<div class="container">
		<div class="row d-flex align-items-stretch no-gutters">
			<div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
				<h2 class="h4 mb-2 mb-md-5 font-weight-bold">Create Your Account</h2>

				<form action="" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control" name="first_name" placeholder="First Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="last_name" placeholder="last Name">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Your Email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="city" placeholder="Your City">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="phone" placeholder="Your Phone">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
					</div>
					<div class="form-group">
						<input type="file" class="form-control" name="image">
					</div>

					<div class="form-group">
						<input type="submit" value="Register" class="btn btn-primary py-3 px-5">
					</div>

				</form>
				<u><a href="{{ url('login') }}">I have an Account</a></u>
			</div>
			<div class="col-md-6 d-flex align-items-stretch">
				<div id="map"></div>
			</div>
		</div>
	</div>
</section>

@endsection