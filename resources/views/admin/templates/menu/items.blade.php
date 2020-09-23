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
							<button class="btn btn-primary pull-right add-item-modal-button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Add Item</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<!-- Table -->
							<table class="table table-bordered">
								<thead>                  
									<tr>
										<th style="width: 10px">#</th>
										<th>Title</th>
										<th>Ingredients</th>
										<th>Category</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse($items as $item)
										<tr>
											<td>{{ $item->id }}</td>
											<td>{{ $item->title }}</td>
											<td>
												<?php
													$ingredient_ids = explode(",", $item->ingredients);
													foreach ($ingredient_ids as $key => $value) {
														$ingredient = App\Models\Ingrediants::find($value)->ingrediant;
														echo "<li>".$ingredient."</li>";
													}
												?>
												
											</td>
											<td>
												<?php
													$category_ids = explode(",", $item->category);
													foreach ($category_ids as $key => $value) {
														$category = App\Models\Categories::find($value)->category;
														echo "<li>".$category."</li>";
													}
												?>
											</td>
											<td><img height="100px;" width="150px;" src="{{ $item->image }}"></td>
											<td>
												<a id="admin_delete_menu_item" onClick="return confirm('Are you sure??')" item-url="{{ route('admin_delete_menu_item',$item->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
												<a href="#" id="admin_edit_menu_item" data-toggle="modal" data-target="#exampleModal" item-url="{{ route('admin_edit_menu_item',$item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="6">No Item is available</td>
										</tr>
									@endforelse
								</tbody>
								<tfoot>
									<tr>
										<th style="width: 10px">#</th>
										<th>Title</th>
										<th>Ingredients</th>
										<th>Category</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
							<!-- End Table -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<div class="pull-right">{{ $items->links() }}</div>
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
										<form enctype="multipart/form-data" autocomplete="off" id="menu_item_form_submit" role="form" action="" method="POST">
											@csrf
											<div class="card-body">
												<div class="form-group">
													<label for="exampleInputEmail1">Title</label>
													<input type="text" name="title" minlength="6" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Title" required>
												</div>

												<div class="form-group">
													<label>Ingrediants</label>
													<div class="select2-purple" id="item_ingredient">
														<select class="select2" name="ingredients[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
															@forelse($ingrediants as $ingrediant)
															<option id="menu_ingrediant{{ $ingrediant->id }}" value="{{ $ingrediant->id }}">{{ $ingrediant->ingrediant }}</option>
															@empty
															<option value="">No Ingrediant Available</option>
															@endforelse
														</select>
													</div>
												</div>

												<div class="form-group">
													<label>Category</label>
													<div class="select2-purple" id="item_category">
														<select class="select2" name="category[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
															@forelse($categories as $category)
															<option id="menu_category{{ $category->id }}" value="{{ $category->id }}">{{ $category->category }}</option>
															@empty
															<option value="">No Category Available</option>
															@endforelse
														</select>
													</div>
												</div>

												<div class="form-group">
													<label>Price (In Dollar)</label>
													<input type="number" name="price" class="form-control" placeholder="Enter Price" required>
												</div>

												<div class="form-group">
													<label for="exampleInputFile">Upload Image</label>
													<div class="input-group">
														<div class="custom-file">
															<input name="image" type="file" class="custom-file-input" id="exampleInputFile">
															<label class="custom-file-label" for="exampleInputFile">Choose file</label>
														</div>
														<div class="input-group-append">
															<span class="input-group-text" id="">Upload</span>
														</div>
													</div>
												</div>
												<img id="item_image" src="" height="100px;" width="200px;" hidden=""> 
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
		@if(!empty($error))
			@foreach($error->all() as $error)
				@if($error)
					toastr.error("{{ $error }}");
				@endif
			@endforeach
		@endif
		@if (count($errors) > 0)
      		@foreach ($errors->all() as $error)
       			toastr.error("{{ $error }}");
      		@endforeach
   		@endif
	</script>

@endpush

@push('custom-css')
	<link rel="stylesheet" href="{{ url('resources/assets/admin/custom/css/menu-items.css') }}">
@endpush

@endsection