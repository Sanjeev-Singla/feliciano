@extends("admin.common.master")
@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Sauciers List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Home</a></li>
						<li class="breadcrumb-item active">Sauciers</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!--Modal-->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Bordered Table</h3>
							<button class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Add Saucier</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered">
								<thead>                  
									<tr>
										<th style="width: 10px">#</th>
										<th>Name</th>
										<th>Position</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse($sauciers as $saucier)
									<tr id="ingrediant_content">
										<td>{{ $saucier->id }}</td>
										<td>{{ $saucier->name }}</td>
										<td>{{ $saucier->position }}</td>
										<td><img height="100px;" width="150px;" src="{{ $saucier->image }}"></td>
										<td><a href="#" onclick="return confirm('Are you sure?')" id="admin_delete_saucier" item-url="{{ route('admin_delete_saucier',$saucier->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a></td>
									</tr>
									@empty
									<tr>
										<td colspan="5" class="text-center">No Saucier Availble</td>
									</tr>
									@endforelse
								</tbody>
								<tfoot>                  
									<tr>
										<th style="width: 10px">#</th>
										<th>Name</th>
										<th>Position</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<div class="pull-right">{!! $sauciers->links() !!}</div>
						</div>
					</div>
					<!-- /.card -->
				</div>
			</div>
			<!-- /.row -->

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Saucier Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<!-- left column -->
								<div class="col-md-12">
									<!-- general form elements -->
									<div class="card card-info">
										<div class="card-header">
											<h3 class="card-title">Add Saucier</h3>
										</div>
										<!-- /.card-header -->
										<!-- form start -->
										<form autocomplete="off" enctype="multipart/form-data" id="menu_item_form_submit" role="form" action="" method="POST">
											@csrf
											<div class="card-body">
												<div class="form-group">
													<label for="exampleInputEmail1">Name</label>
													<input type="text" name="name" minlength="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Saucier Name" required>
												</div>

												<div class="form-group">
													<label for="exampleInputEmail1">Position</label>
													<input type="text" name="position" minlength="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Saucier Position" required>
												</div>

												<div class="form-group">
													<label for="exampleInputEmail1">Twitter Link</label>
													<input type="text" name="twitter_link" minlength="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Twitter Link">
												</div>

												<div class="form-group">
													<label for="exampleInputEmail1">Facebook Link</label>
													<input type="text" name="facebook_link" minlength="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Facebook Link">
												</div>

												<div class="form-group">
													<label for="exampleInputEmail1">Google+ Link</label>
													<input type="text" name="google_plus_link" minlength="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Google+ Link">
												</div>

												<div class="form-group">
													<label for="exampleInputEmail1">Instagram Link</label>
													<input type="text" name="instagram_link" minlength="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Instagram Link">
												</div>

												<div class="form-group">
													<label for="exampleInputFile">Saucier Image</label>
													<div class="input-group">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="exampleInputFile" name="image">
															<label class="custom-file-label" for="exampleInputFile">Saucier Image</label>
														</div>
														<div class="input-group-append">
															<span class="input-group-text" id="">Upload</span>
														</div>
													</div>
												</div>
											</div>
											<!-- /.card-body -->

											<div class="card-footer">
												<button id="menu_item_form_button" type="submit" class="btn btn-info pull-right">Submit</button>
											</div>
										</form>
									</div>
									<!-- /.card -->
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End Modal -->

		</div>
	</section>
</div>

@push('custom-js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
	<script src="{{ url('resources/assets/admin/custom/js/sauciers.js') }}"></script>
	<script type="text/javascript">
		@if(Session::has('message'))
			let sess_class = "{{ Session::get('class') }}";
			let sess_msg = "{{ Session::get('message') }}";
			if (sess_class == 'success') {
			    toastr.success(sess_msg);
			} else if (sess_class == 'danger') {
			    toastr.error(sess_msg);
			}else{
				toastr.info("Something Went Wrong!");
			}
		@endif
	</script>
@endpush

@endsection