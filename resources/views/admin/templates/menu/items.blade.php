@extends("admin.common.master")
@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Items List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('admin/home') }}">Home</a></li>
						<li class="breadcrumb-item active">Items</li>
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
							<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Add Item</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered">
								<thead>                  
									<tr>
										<th style="width: 10px">#</th>
										<th>Task</th>
										<th>Progress</th>
										<th style="width: 40px">Label</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>Update software</td>
										<td>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
											</div>
										</td>
										<td><span class="badge bg-danger">55%</span></td>
									</tr>
									<tr>
										<td>2.</td>
										<td>Clean database</td>
										<td>
											<div class="progress progress-xs">
												<div class="progress-bar bg-warning" style="width: 70%"></div>
											</div>
										</td>
										<td><span class="badge bg-warning">70%</span></td>
									</tr>
									<tr>
										<td>3.</td>
										<td>Cron job running</td>
										<td>
											<div class="progress progress-xs progress-striped active">
												<div class="progress-bar bg-primary" style="width: 30%"></div>
											</div>
										</td>
										<td><span class="badge bg-primary">30%</span></td>
									</tr>
									<tr>
										<td>4.</td>
										<td>Fix and squish bugs</td>
										<td>
											<div class="progress progress-xs progress-striped active">
												<div class="progress-bar bg-success" style="width: 90%"></div>
											</div>
										</td>
										<td><span class="badge bg-success">90%</span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<ul class="pagination pagination-sm m-0 float-right">
								<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
							</ul>
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
							<h5 class="modal-title" id="exampleModalLabel">Add Menu Item</h5>
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
											<h3 class="card-title">Item Details</h3>
										</div>
										<!-- /.card-header -->
										<!-- form start -->
										<form id="menu_item_form_submit" role="form" action="" method="POST">
											@csrf
											<div class="card-body">
												<div class="form-group">
													<label for="exampleInputEmail1">Title</label>
													<input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Title">
												</div>

												<div class="form-group">
													<label>Ingrediants</label>
													<div class="select2-purple">
														<select class="select2" name="ingrediants[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
															<option>Alabama</option>
															<option>Alaska</option>
															<option>California</option>
															<option>Delaware</option>
															<option>Tennessee</option>
															<option>Texas</option>
															<option>Washington</option>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label>Category</label>
													<div class="select2-purple">
														<select class="select2" name="category[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
															<option>Alabama</option>
															<option>Alaska</option>
															<option>California</option>
															<option>Delaware</option>
															<option>Tennessee</option>
															<option>Texas</option>
															<option>Washington</option>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label>Price (In Dollar)</label>
													<input type="text" name="price" class="form-control" placeholder="Enter Price">
												</div>

												<div class="form-group">
													<label for="exampleInputFile">Upload Image</label>
													<div class="input-group">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="exampleInputFile">
															<label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
	<script src="{{ url('resources/assets/admin/custom/js/menu-items.js') }}"></script>
@endpush

@push('custom-css')
	<link rel="stylesheet" href="{{ url('resources/assets/admin/custom/css/menu-items.css') }}">
@endpush

@endsection