<!---<script src="<?php echo base_url();?>assets/js/jquery-1.12.4.min.js" ></script>--> 
<script  src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap4.min.js" ></script>

<script type="text/javascript">
	$(document).ready(function(){
		var dataTable = $("#user_data").DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"autoWidth": false,
			"ajax":{
				url: '<?php echo base_url()."index.php/admin/fetch_products";?>',
				type: "POST"
			},
			"columnDefs":[
				{
					"targets":[2,3,4,5,6,7,8],
					"orderable":false,
				}
			]
		});
		
		/*dataTable.on('order.dt search.dt', function () {
			dataTable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
				cell.innerHTML = i + 1;
			});
        }).draw();*/
		dataTable.on('draw.dt', function () {
			var info = dataTable.page.info();
			dataTable.column(0, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
				cell.innerHTML = i + 1 + info.start;
			});
		});
		
		$('#product_form').submit(function(event){ 
			event.preventDefault();
			var product_name = $("#product_name").val();
			var product_type = $("#product_type").val();
			var collection = $("#collection").val();
			var sku_sw = $("#sku_sw").val();
			var sku_beu = $("#sku_beu").val();
			var ean = $("#ean").val();
			var quality = $("#quality").val();
			var color1 = $("#color1").val();
			var color2 = $("#color2").val();
			var color3 = $("#color3").val();
			var design_type = $("#design_type").val();
			var img_link = $("#img_link").val();
			
			if(product_name !=""){
				$.ajax({
					url: '<?php echo base_url()."index.php/admin/product_action";?>',
					type:"POST",
					data: $('#product_form').serialize(),
					dataType:'json',
					success:function(json)
					{ 
						if(json.status == true){
							$('#success-alert').text(json.response);
							$('#success-alert').fadeIn();
							$('.page-title').text("Add Product"); 
						}
						else {
							$('#error-alert').text(json.response);
							$('#error-alert').fadeIn();
						}
						$('#product_form')[0].reset();
						dataTable.ajax.reload();
						$("#product_id").val("");
						setTimeout(function() { $('.alert').fadeOut(); }, 3000);
					}
				});
			}
			else {
				$("#product_name").focus();
				alert("Product name is required");
			}
		});
		
		 $(document).on('click', '.update-btn', function () {
			var product_id = $(this).attr("id");
			$.ajax({
					url: '<?php echo base_url()."index.php/admin/fetch_single_product";?>',
					type:"POST",
					data: {product_id: product_id},
					dataType:'json',
					success:function(json)
					{
						$('#product_form')[0].reset();
						
						$("#product_name").val(json.product_name);
						$("#product_type").val(json.product_type);
						$("#collection").val(json.collection);
						$("#pro_collection").val(json.pro_collection);
						$("#pg").val(json.pg);
						$("#sku_sw").val(json.sku_sw);
						$("#sku_beu").val(json.sku_beu);
						$("#ean").val(json.ean);
						$("#quality").val(json.quality);
						$("#color1").val(json.color1);
						$("#color2").val(json.color2);
						$("#color3").val(json.color3);
						$("#design_type").val(json.design_type);
						$("#img_link").val(json.img_link);
						$("#product_id").val(product_id);
						$('.page-title').text("Edit Product");
						$("html").animate({ scrollTop: 0 }, 500);
					}
			});
		});
		
		$(document).on('click', '.delete-btn', function () {
			var product_id = $(this).attr("id");
			if(confirm("Are you sure want to delete this?")) {
				$.ajax({
					url:'<?php echo base_url()."index.php/admin/delete_single_product";?>',
					type:'POST',
					data:{product_id : product_id},
					dataType:'json',
					success: function(json){
						if(json.status == true){
							$('#success-alert').text(json.response);
							$('#success-alert').fadeIn();
						}
						else {
							$('#error-alert').text(json.response);
							$('#error-alert').fadeIn();
						}
						dataTable.ajax.reload();
						setTimeout(function() { $('.alert').fadeOut(); }, 3000);
					}
				});
			}
			else {
				return false;
			}
		});
		
		//Import CSV
		$('#import_csv_form').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url: "<?php echo base_url();?>index.php/csv_import/import",
				method:"POST",
				data:new FormData(this),
				dataType:'json',
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
				},
				success : function(json){
					$('#import_csv_form')[0].reset();
					if(json == "success"){
						$('#success-alert').show();
					}
					
					dataTable.ajax.reload();
					setTimeout(function() { $('.alert').fadeOut(); }, 3000);
				}
			});
		});
		
	});
</script>
</body>
</html>