
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-title">Add Product</h1>
			<div class="form-wrapper card">
				<div class="card-body">
					<div id="success-alert" class="alert alert-success" role="alert">
						Added Successfully!
					</div>
					<div id="error-alert" class="alert alert-danger" role="alert">
						Error! Not added.
					</div>
					<form method="post" id="product_form" class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Product Name</label>
								<input type="text" id="product_name" name="product_name" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Product Type</label>
								<input type="text" id="product_type" name="product_type" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Collection</label>
								<input type="text" id="collection" name="collection" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>PRO collection</label>
								<input type="text" id="pro_collection" name="pro_collection" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>PG</label>
								<input type="text" id="pg" name="pg" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>SKU SW</label>
								<input type="text" id="sku_sw" name="sku_sw" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>SKU BEU</label>
								<input type="text" id="sku_beu" name="sku_beu" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>EAN</label>
								<input type="text" id="ean" name="ean" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Quality</label>
								<input type="text" id="quality" name="quality" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Color 1</label>
								<input type="text" id="color1" name="color1" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Color 2</label>
								<input type="text" id="color2" name="color2" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Color 3</label>
								<input type="text" id="color3" name="color3" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Design Type</label>
								<input type="text" id="design_type" name="design_type" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Image Link</label>
								<input type="text" id="img_link" name="img_link" class="form-control">
								<input type="hidden" name="product_id" id="product_id">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" class="btn btn-success btn-md" name="submit" value="Save">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="table-responsive">
				<br>
				<table id="user_data" class="table table-bordered table-striped" style="width:990px;">
					<thead>
						<th width="10%">ID</th>
						<th width="30%">Product Name</th>
						<th width="10%">SKU SW</th>
						<th width="10%">EAN</th>
						<th width="30%">color1</th>
						<th width="30%">color2</th>
						<th width="30%">color3</th>
						<th width="10%">Design type</th>
						<th width="10%">IMG</th>
						<th width="10%">Actions</th>
					</thead>
				</table>
			</div>
			
		</div>
	</div>
</div>