<?php
class Home_model extends CI_Model {
		
        public function __construct()
        {           
        }
		
		public function get_all_products(){
			/*$this->db->select('*');
			$this->db->from('products');
			$query = $this->db->get();*/
			$query = $this->db->get('products');
			return $query->result_array();
		}
		public function get_filter_type($type) {
			$where_cond = $type." IS NOT NULL";
			$this->db->distinct();
			$this->db->select($type);
			$this->db->from('products');
			$this->db->where($where_cond);
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function get_all_colors(){
			$query = $this->db->query("
				SELECT * FROM (
					SELECT p_color1 AS color FROM products 
					UNION
					SELECT p_color2 AS color FROM products 
					UNION
					SELECT p_color3 AS color FROM products 
				) t WHERE color IS NOT NULL
				ORDER BY color
			");
			return $query->result_array();
		}
		
		public function make_query($color, $design_type){
			$query = "
				SELECT * FROM products WHERE '".$color."' IN (p_color1, p_color2, p_color3)
			";
			/*if($color1 != ""){
				$query .= "AND p_color1='".$color1."'";
			}
			if($color2 != ""){
				$query .= "AND p_color2='".$color2."'";
			}
			if($color3 != ""){
				$query .= "AND p_color3='".$color3."'";
			}*/
			if($design_type != ""){
				$query .= "AND p_design_type1='".$design_type."'"; 
			}
			return $query;
		}
		
		public function fetch_data($color, $design_type){
			$query = $this->make_query($color, $design_type);
			$data = $this->db->query($query);
			
			$output = "";
			if($data->num_rows() > 0){
				foreach($data->result_array() as $row){
					$output .='
						<div class="col-md-6 col-lg-6">
							<article class="product_item">
								<figure>
									<a href="'.$row['p_img_url'].'"><img src="'.$row['p_img_url'].'" class="img-fluid"></a>
								</figure>
								<h1>'.$row['p_name'].'</h1>
								<p>
									SKU SW : '.$row['p_sku_sw'].' <br>
									EAN : '.$row['p_ean'].' <br>
									PRO collection : '.$row['p_pro_collect'].'
								</p>
							</article>
						</div>
					';
				}
			}
			else {
				$output = '<h3 class="no-product-msg">No products were found matching your selection</h3>';
			}
			return $output;
		}
}
?>