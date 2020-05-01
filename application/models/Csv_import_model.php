<?php
class Csv_import_model extends CI_Model {
		
		public function insert($data){
			$this->db->insert_batch('products', $data);
			if($this->db->affected_rows() > 0 ) {
				/*$status = array(
					"status" => "success"
				);*/
				$status = "success";
			}
			else {
				$status = "error";
			}
			return $status;
		}
		
}