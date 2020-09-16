@extends("public.common.master")
@section("content")

<section class="hero-wrap hero-wrap-2" style="background-image: url('resources/assets/public/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate text-center mb-4">
				<h1 class="mb-2 bread">Specialties</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section">
	<div class="container">
		<div class="ftco-search">
			<div class="row">
				<div class="col-md-12 nav-link-wrap">
					<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Breakfast</a>

						<a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Lunch</a>

						<a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Dinner</a>

						<a class="nav-link ftco-animate" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Drinks</a>

						<a class="nav-link ftco-animate" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Desserts</a>

						<a class="nav-link ftco-animate" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Wine</a>

					</div>
				</div>
				<div class="col-md-12 tab-wrap">

					<div class="tab-content" id="v-pills-tabContent">
						<!-- Breakfast -->
						<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
							<div class="row no-gutters d-flex align-items-stretch">

								@php
									$i = 1;
								@endphp
								@foreach($menus as $menu)
									@php
										$class = "";
										$category_ids = [];
										if ($i%3==0 || $i%4==0) {
											$class = "order-md-last";
										}
										$category_ids = explode(",", $menu->category);
									@endphp
									@if(in_array("6",$category_ids))
									<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
										<div class="menus d-sm-flex ftco-animate align-items-stretch">
											
											<img class="menu-img img {{ $class }}" src="{{ $menu->image }}">
											<div class="text d-flex align-items-center">
												<div>
													<div class="d-flex">
														<div class="one-half">
															<h3>{{ Str::words($menu->title,4) }}</h3>
														</div>
														<div class="one-forth">
															<span class="price">${{ $menu->price }}</span>
														</div>
													</div>
													<p>
														<?php
															$ingredient = [];
															$ingredient_ids = explode(",", $menu->ingredients);
															foreach ($ingredient_ids as $key => $value) {
																$ingredient[] = App\Models\Ingrediants::find($value)->ingrediant;
															}
														?>
														{{ Str::words(implode(", ", $ingredient),6) }}
													</p>
													<p><a href="#" class="btn btn-primary">Order now</a></p>
												</div>
											</div>
										</div>
									</div>
									@php
										if (!empty($class)) {
									 		unset($class);
										}
										$i++;
									@endphp
									@endif
								@endforeach
							</div>
						</div>
						<!-- End BreakFast -->

						<!-- Lunch -->
						<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
							<div class="row no-gutters d-flex align-items-stretch">
								@php
									$i = 1;
								@endphp
								@foreach($menus as $menu)
									@php
										$class = "";
										$category_ids = [];
										if ($i%3==0 || $i%4==0) {
											$class = "order-md-last";
										}
										$category_ids = explode(",", $menu->category);
									@endphp
									@if(in_array("7",$category_ids))
									<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
										<div class="menus d-sm-flex ftco-animate align-items-stretch">
											
											<img class="menu-img img {{ $class }}" src="{{ $menu->image }}">
											<div class="text d-flex align-items-center">
												<div>
													<div class="d-flex">
														<div class="one-half">
															<h3>{{ Str::words($menu->title,4) }}</h3>
														</div>
														<div class="one-forth">
															<span class="price">${{ $menu->price }}</span>
														</div>
													</div>
													<p>
														<?php
															$ingredient = [];
															$ingredient_ids = explode(",", $menu->ingredients);
															foreach ($ingredient_ids as $key => $value) {
																$ingredient[] = App\Models\Ingrediants::find($value)->ingrediant;
															}
														?>
														{{ Str::words(implode(", ", $ingredient),6) }}
													</p>
													<p><a href="#" class="btn btn-primary">Order now</a></p>
												</div>
											</div>
										</div>
									</div>
									@php
										if (!empty($class)) {
									 		unset($class);
										}
										$i++;
									@endphp
									@endif
								@endforeach
							</div>
						</div>
						<!--End Lunch -->

						<!-- Dinner -->
						<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
							<div class="row no-gutters d-flex align-items-stretch">
								@php
									$i = 1;
								@endphp
								@foreach($menus as $menu)
									@php
										$class = "";
										$category_ids = [];
										if ($i%3==0 || $i%4==0) {
											$class = "order-md-last";
										}
										$category_ids = explode(",", $menu->category);
									@endphp
									@if(in_array("8",$category_ids))
									<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
										<div class="menus d-sm-flex ftco-animate align-items-stretch">
											
											<img class="menu-img img {{ $class }}" src="{{ $menu->image }}">
											<div class="text d-flex align-items-center">
												<div>
													<div class="d-flex">
														<div class="one-half">
															<h3>{{ Str::words($menu->title,4) }}</h3>
														</div>
														<div class="one-forth">
															<span class="price">${{ $menu->price }}</span>
														</div>
													</div>
													<p>
														<?php
															$ingredient = [];
															$ingredient_ids = explode(",", $menu->ingredients);
															foreach ($ingredient_ids as $key => $value) {
																$ingredient[] = App\Models\Ingrediants::find($value)->ingrediant;
															}
														?>
														{{ Str::words(implode(", ", $ingredient),6) }}
													</p>
													<p><a href="#" class="btn btn-primary">Order now</a></p>
												</div>
											</div>
										</div>
									</div>
									@php
										if (!empty($class)) {
									 		unset($class);
										}
										$i++;
									@endphp
									@endif
								@endforeach
							</div>
						</div>
						<!--End Dinner -->

						<!-- Drinks -->
						<div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-day-4-tab">
							<div class="row no-gutters d-flex align-items-stretch">
								@php
									$i = 1;
								@endphp
								@foreach($menus as $menu)
									@php
										$class = "";
										$category_ids = [];
										if ($i%3==0 || $i%4==0) {
											$class = "order-md-last";
										}
										$category_ids = explode(",", $menu->category);
									@endphp
									@if(in_array("9",$category_ids))
									<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
										<div class="menus d-sm-flex ftco-animate align-items-stretch">
											
											<img class="menu-img img {{ $class }}" src="{{ $menu->image }}">
											<div class="text d-flex align-items-center">
												<div>
													<div class="d-flex">
														<div class="one-half">
															<h3>{{ Str::words($menu->title,4) }}</h3>
														</div>
														<div class="one-forth">
															<span class="price">${{ $menu->price }}</span>
														</div>
													</div>
													<p>
														<?php
															$ingredient = [];
															$ingredient_ids = explode(",", $menu->ingredients);
															foreach ($ingredient_ids as $key => $value) {
																$ingredient[] = App\Models\Ingrediants::find($value)->ingrediant;
															}
														?>
														{{ Str::words(implode(", ", $ingredient),6) }}
													</p>
													<p><a href="#" class="btn btn-primary">Order now</a></p>
												</div>
											</div>
										</div>
									</div>
									@php
										if (!empty($class)) {
									 		unset($class);
										}
										$i++;
									@endphp
									@endif
								@endforeach
							</div>
						</div>
						<!--End Drinks -->

						<!-- Deserts -->
						<div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-day-5-tab">
							<div class="row no-gutters d-flex align-items-stretch">
								@php
									$i = 1;
								@endphp
								@foreach($menus as $menu)
									@php
										$class = "";
										$category_ids = [];
										if ($i%3==0 || $i%4==0) {
											$class = "order-md-last";
										}
										$category_ids = explode(",", $menu->category);
									@endphp
									@if(in_array("10",$category_ids))
									<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
										<div class="menus d-sm-flex ftco-animate align-items-stretch">
											
											<img class="menu-img img {{ $class }}" src="{{ $menu->image }}">
											<div class="text d-flex align-items-center">
												<div>
													<div class="d-flex">
														<div class="one-half">
															<h3>{{ Str::words($menu->title,4) }}</h3>
														</div>
														<div class="one-forth">
															<span class="price">${{ $menu->price }}</span>
														</div>
													</div>
													<p>
														<?php
															$ingredient = [];
															$ingredient_ids = explode(",", $menu->ingredients);
															foreach ($ingredient_ids as $key => $value) {
																$ingredient[] = App\Models\Ingrediants::find($value)->ingrediant;
															}
														?>
														{{ Str::words(implode(", ", $ingredient),6) }}
													</p>
													<p><a href="#" class="btn btn-primary">Order now</a></p>
												</div>
											</div>
										</div>
									</div>
									@php
										if (!empty($class)) {
									 		unset($class);
										}
										$i++;
									@endphp
									@endif
								@endforeach
							</div>
						</div>
						<!-- End Deserts -->

						<!-- Wine -->
						<div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-day-6-tab">
							<div class="row no-gutters d-flex align-items-stretch">
								@php
									$i = 1;
								@endphp
								@foreach($menus as $menu)
									@php
										$class = "";
										$category_ids = [];
										if ($i%3==0 || $i%4==0) {
											$class = "order-md-last";
										}
										$category_ids = explode(",", $menu->category);
									@endphp
									@if(in_array("11",$category_ids))
									<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
										<div class="menus d-sm-flex ftco-animate align-items-stretch">
											
											<img class="menu-img img {{ $class }}" src="{{ $menu->image }}">
											<div class="text d-flex align-items-center">
												<div>
													<div class="d-flex">
														<div class="one-half">
															<h3>{{ Str::words($menu->title,4) }}</h3>
														</div>
														<div class="one-forth">
															<span class="price">${{ $menu->price }}</span>
														</div>
													</div>
													<p>
														<?php
															$ingredient = [];
															$ingredient_ids = explode(",", $menu->ingredients);
															foreach ($ingredient_ids as $key => $value) {
																$ingredient[] = App\Models\Ingrediants::find($value)->ingrediant;
															}
														?>
														{{ Str::words(implode(", ", $ingredient),6) }}
													</p>
													<p><a href="#" class="btn btn-primary">Order now</a></p>
												</div>
											</div>
										</div>
									</div>
									@php
										if (!empty($class)) {
									 		unset($class);
										}
										$i++;
									@endphp
									@endif
								@endforeach
							</div>
						</div>
						<!--End Wine -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection