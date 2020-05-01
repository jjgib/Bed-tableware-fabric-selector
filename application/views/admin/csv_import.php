
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-title">Import CSV file</h1>
			<div class="form-wrapper card">
				<div class="card-body">
					<div id="success-alert" class="alert alert-success" role="alert">
						Import Data Successfully!
					</div>
					<div id="error-alert" class="alert alert-danger" role="alert">
						Error!
					</div> 
					<form id="import_csv_form" class="row" enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="form-group">
								<label>Upload file</label>
								<input type="file" id="csv_file" name="csv_file" required accept=".csv">
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" class="btn btn-success btn-md" name="import_csv" id="import_csv_btn" value="Save">
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