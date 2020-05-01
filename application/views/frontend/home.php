<main>
	<div class="container-fluid">
		<div class="hero">
			<h1>WILLKOMMEN IN IHREM BETTWÄSCHE DESIGN GUIDE</h1>
			<h2>Hier finden Sie auf einen Blick das für Sie beste Design<br>
und bekommen so eine perfekte Vorstellung von Ihrer Traumbettwäsche.<br>
kompletten Design machen</h2>
		</div>
		<div class="product-filter-wrap">
			<h2>Finden Sie die Designs und Farben Ihrer Wahl</h2> 
			<ul class="row filter-items">
				<li class="col-md-3">
						<label>Type
						</label>
						<select class="form-control" id="color1" name="color1" onchange="filter_data(1)">
							<option value="">Meine Wahl</option> 
							<option value="Bettwasche">Bettwäsche</option>
							<option value="Tischwasche">Tischwäsche</option>
						</select>
					</li>  
				<li class="col-md-3">
					<label>Farbe
					</label>
					<select class="form-control" id="color1" name="color1" onchange="filter_data(1)">
						<option value="">Meine Wahl</option> 
						<?php foreach($color1 as $color_row):
								if($color_row['color'] != ""){?>
							<option value="<?php echo $color_row['color'];?>"><?php echo $color_row['color'];?></option>
								<?php  }
							endforeach; ?>
					</select>
				</li>  
				<!---<li class="col-md-3">
					<label>Color 2
					</label>
					<select class="form-control" id="color2" name="color2" onchange="filter_data(1)">
						<option value="">Select</option>
						<?php foreach($color2 as $color_row):
								if($color_row['p_color2'] != ""){?> 
							<option value="<?php echo $color_row['p_color2'];?>"><?php echo $color_row['p_color2'];?></option>
						<?php  }
							endforeach; ?>
					</select>
				</li>
				<li class="col-md-3">
					<label>Color 3
					</label>
					<select class="form-control" id="color3" name="color3" onchange="filter_data(1)">
						<option value="">Select</option>
						<?php foreach($color3 as $color_row):
								if($color_row['p_color3'] != ""){?> 
							<option value="<?php echo $color_row['p_color3'];?>"><?php echo $color_row['p_color3'];?></option>
						<?php   }
							endforeach; ?>
					</select>
				</li>-->
				<li class="col-md-3">
					<label>Design
					</label>
					<select class="form-control" id="design_type" name="design_type" onchange="filter_data(1)">
						<option value="">Meine Wahl</option>
						<?php foreach($design_type as $type_row):
								if($type_row['p_design_type1'] != ""){?> 
							<option value="<?php echo $type_row['p_design_type1'];?>"><?php echo $type_row['p_design_type1'];?></option>
						 <?php  }
							endforeach; ?>
					</select>  
				</li>
			</ul>
		</div>
		<div class="filter_data_wrap">
			<div id="filter_data" class="filter_data row">
				<?php
					if(!empty($products)){
						$i = 0;
					foreach ($products as $product_item): 
						$i++;?>
				<div class="col-md-6 col-lg-6">
					<article class="product_item">
						<figure>
							<a href="<?php echo $product_item['p_img_url'];?>" class="swipebox">
								<?php if($i <= 4){?>
								<img class="img-fluid" src="<?php echo $product_item['p_img_url'];?>">
								<?php }
									else {?>
								<img class="lazy img-fluid" data-src="<?php echo $product_item['p_img_url'];?>">
								<?php }?>
							</a>
						</figure>
						<h1><?php echo $product_item['p_name'];?></h1>
						<p>
							SKU SW : <span><?php echo $product_item['p_sku_sw'];?></span> <br>
							EAN : <span><?php echo $product_item['p_ean'];?></span> <br>
							PRO collection : <span><?php echo $product_item['p_pro_collect'];?></span> <br>
							PG : <span><?php echo $product_item['p_pg'];?></span>
						</p>
					</article>
				</div>
				<?php endforeach; 
					}
					else {?>
					<h3 class="no-product-msg">No products.</h3>
					<?php }?>
			</div>
		</div>
	</div>
</main>