<?php
class Admin_model extends CI_Model {
		
		var $table = "products";
		var $selectColumn = array("id","p_name","p_sku_sw","p_sku_beu","p_ean","p_color1","p_color2","p_color3","p_design_type1","p_img_url");
		var $order_column = array(null,"p_name",null,null,null,null,null,null,null,null);
		
        public function __construct()
        {
             
        }
		
		public function make_query(){
			$this->db->select($this->selectColumn);
			$this->db->from($this->table);
			if(isset($_POST['search']['value'])){
				$this->db->like("p_name",$_POST['search']['value']);
				$this->db->or_like("p_color1",$_POST['search']['value']);
				$this->db->or_like("p_color2",$_POST['search']['value']);
				$this->db->or_like("p_color3",$_POST['search']['value']);
			}
			if(isset($_POST["order"])){
				$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			}
			else {
				$this->db->order_by("id", "DESC"); 
			}
			
		}
		
		public function make_datatables(){
			$this->make_query();
			if($_POST["length"] != -1){
				$this->db->limit($_POST["length"], $_POST["start"]);
			}
			$query = $this->db->get();
			return $query->result();
		}
		
		public function get_filtered_data(){
			$this->make_query();
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		public function get_all_data(){
			$this->db->select("*");
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}
		
		public function insert_details($data){
			$this->db->insert("products", $data);
			//$this->db->trans_complete();
			if($this->db->affected_rows() > 0 ) {
				$transResult = array(
					'response' => 'Added successfully!',
					'status' => true
				);
			}
			else {
				$transResult = array(
					'response' => 'Unexpected error! Please try again.',
					'status' => false
				);
			}
			return $transResult;
		}
		
		public function update_details($data, $product_id){
			$this->db->where('id', $product_id);
			$this->db->update('products', $data);
			
			if($this->db->affected_rows() > 0 ) {
				$transResult = array(
					'response' => 'Update successfully!',
					'status' => true
				);
			}
			else {
				$transResult = array(
					'response' => 'No changes done', 
					'status' => false
				);
			}
			return $transResult;
		}
		
		public function fetch_single_product($prod_id){
			$this->db->where("id", $prod_id);
			$query = $this->db->get("products");
			return $query->result();
		}
		
		public function delete_single_product($prod_id){
			$this->db->where("id", $prod_id);
			$this->db->delete("products");
			if($this->db->affected_rows() > 0 ) {
				$transResult = array(
					'response' => 'Deleted successfully!',
					'status' => true
				);
			}
			else {
				$transResult = array(
					'response' => 'Unexpected error! Details not updated',
					'status' => false
				);
			}
			return $transResult;
		}
}

?>