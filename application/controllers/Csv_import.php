<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_import extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('csv_import_model'); 
			$this->load->library('csvimport');
	}
	public function index()
	{
		$data['title'] = "CSV";
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/csv_import',$data);
		$this->load->view('admin/footer',$data);
	}
	public function import(){
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row){
			$data[] = array(
				'p_name'		=>	$row["Name of fabrics"],
				'p_type'		=>	$row["Type"],
				'p_collection'	=>	$row["Collection"],
				'p_pro_collect' =>  $row["PRO collection"],
				'p_pg' 			=>  $row["PG"],
				'p_sku_sw'		=>	$row["SKU SW"],
				'p_sku_beu'		=>	$row["SKU be U"],
				'p_ean'			=>	$row["EAN"],
				'p_quality'		=>	$row["Quality"],
				'p_color1'		=>	$row["Colour 1"],
				'p_color2'		=>	$row["Colour 2"],
				'p_color3'		=>	$row["Colour 3"],
				'p_design_type1'=>	$row["design type 1"],
				'p_img_url'		=>	$row["link to photo ftp"]
			);
		} 
		$insertData = $this->csv_import_model->insert($data);
		echo json_encode($insertData);
	}
	
}