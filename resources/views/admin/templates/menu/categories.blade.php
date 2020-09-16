@extends("admin.common.master")
@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Categories List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Home</a></li>
						<li class="breadcrumb-item active">Categories</li>
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
							<button class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Add Category</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered">
								<thead>                  
									<tr>
										<th style="width: 10px">#</th>
										<th>Categories</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse($categories as $category)
									<tr>
										<td>{{ $category->id }}</td>
										<td>{{ $category->category }}</td>
										<td><a href="#" id="admin_delete_category" onclick="return confirm('Are you sure?')" item-url="{{ route('admin_delete_category',$category->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
									</tr>
									@empty
									<tr>
										<td colspan="3">No category Availble</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<div class="pull-right">{!! $categories->links() !!}</div>
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
							<h5 class="modal-title" id="exampleModalLabel">Add Category Item</h5>
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
											<h3 class="card-title">Add Category</h3>
										</div>
										<!-- /.card-header -->
										<!-- form start -->
										<form autocomplete="off" id="menu_item_form_submit" role="form" action="" method="POST">
											@csrf
											<div class="card-body">
												<div class="form-group">
													<label for="exampleInputEmail1">Category</label>
													<input type="text" name="category" minlength="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" required>
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
	<script src="{{ url('resources/assets/admin/custom/js/menu-items.js') }}"></script>
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

@push('custom-css')
	<link rel="stylesheet" href="{{ url('resources/assets/admin/custom/css/menu-items.css') }}">
@endpush

@endsection