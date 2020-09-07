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
				<div class="row">
					<!-- left column -->
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<!-- general form elements -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Quick Example</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form role="form">
								<div class="card-body">
									<div class="form-group">
										<label for="exampleInputEmail1">Title</label>
										<input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Title">
									</div>
									
									<div class="form-group">
										<label>Ingrediants</label>
										<div class="select2-purple">
											<select class="select2" name="ingrediants" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
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
											<select class="select2" name="category" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
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
										<label>Price</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="text" class="form-control">
											<div class="input-group-append">
												<span class="input-group-text">.00</span>
											</div>
										</div>
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
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
		        		<!-- /.card -->
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection