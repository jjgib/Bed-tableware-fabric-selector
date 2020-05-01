<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = "Add Product";
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/products',$data);
		$this->load->view('admin/footer',$data);
	}
	public function fetch_products(){
		$this->load->model("admin_model");
		$fetch_data = $this->admin_model->make_datatables();
		$data = array();
		foreach($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = "";
			$sub_array[] = $row->p_name;
			$sub_array[] = $row->p_sku_sw;
			//$sub_array[] = $row->p_sku_beu;
			$sub_array[] = $row->p_ean;
			$sub_array[] = $row->p_color1;
			$sub_array[] = $row->p_color2;
			$sub_array[] = $row->p_color3;
			$sub_array[] = $row->p_design_type1;
			$sub_array[] = '<a title="Click to view large" href="'.$row->p_img_url.'" target="_blank"><img src="'.$row->p_img_url.'" class="thumb" width="70" height="70" /></a>';
			$sub_array[] = '<button type="button" id="'.$row->id.'" name="update" class="btn btn-primary btn-sm update-btn" >Edit</button><button type="button" id="'.$row->id.'" name="delete" class="btn btn-danger btn-sm delete-btn">Delete</button>';
			$data[] = $sub_array;  
		}
		
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->admin_model->get_all_data(),
			"recordsFiltered" => $this->admin_model->get_filtered_data(),
			"data" => $data
		);
		echo json_encode($output); 
	}
	
	public function product_action(){
		if($this->input->post("product_id") == ""){
			$insert_data = array(
				"p_name"	=>$this->input->post("product_name"),
				"p_type"	=>$this->input->post("product_type"),
				"p_collection"	=>$this->input->post("collection"),
				"p_pro_collect"	=>$this->input->post("pro_collection"),
				"p_pg"	=>$this->input->post("pg"),
				"p_sku_sw"	=>$this->input->post("sku_sw"),
				"p_sku_beu"	=>$this->input->post("sku_beu"),
				"p_ean"	=>$this->input->post("ean"),
				"p_quality" =>$this->input->post("quality"),
				"p_color1"	=>$this->input->post("color1"),
				"p_color2"	=>$this->input->post("color2"),
				"p_color3"	=>$this->input->post("color3"),
				"p_design_type1"	=>$this->input->post("design_type"),
				"p_img_url"	=>$this->input->post("img_link")
			);
			$this->load->model("admin_model");
			$insertStatus = $this->admin_model->insert_details($insert_data);
			echo json_encode($insertStatus); 
			
		}
		else { //Edit operation
			$update_data = array(
				"p_name"	=>$this->input->post("product_name"),
				"p_type"	=>$this->input->post("product_type"),
				"p_collection"	=>$this->input->post("collection"),
				"p_pro_collect"	=>$this->input->post("pro_collection"),
				"p_pg"	=>$this->input->post("pg"),
				"p_sku_sw"	=>$this->input->post("sku_sw"),
				"p_sku_beu"	=>$this->input->post("sku_beu"),
				"p_ean"	=>$this->input->post("ean"),
				"p_quality" =>$this->input->post("quality"),
				"p_color1"	=>$this->input->post("color1"),
				"p_color2"	=>$this->input->post("color2"),
				"p_color3"	=>$this->input->post("color3"),
				"p_design_type1"	=>$this->input->post("design_type"),
				"p_img_url"	=>$this->input->post("img_link")
			);
			$this->load->model("admin_model");
			$updateStatus = $this->admin_model->update_details($update_data, $this->input->post("product_id"));
			echo json_encode($updateStatus); 
		}
	}
	
	public function fetch_single_product(){
		$output = array();
		$this->load->model("admin_model");
		$data = $this->admin_model->fetch_single_product($_POST['product_id']);
		foreach($data as $row){
			$output['product_id'] = $row->id;
			$output['product_name'] = $row->p_name;
			$output['product_type'] = $row->p_type;
			$output['collection'] = $row->p_collection;
			$output['pro_collection'] = $row->p_pro_collect;
			$output['pg'] = $row->p_pg;
			$output['sku_sw'] = $row->p_sku_sw;
			$output['sku_beu'] = $row->p_sku_beu;
			$output['ean'] = $row->p_ean;
			$output['quality'] = $row->p_quality;
			$output['color1'] = $row->p_color1;
			$output['color2'] = $row->p_color2;
			$output['color3'] = $row->p_color3;
			$output['design_type'] = $row->p_design_type1;
			$output['img_link'] = $row->p_img_url;
		}
		echo json_encode($output);
	}
	
	public function delete_single_product() {
		$this->load->model("admin_model");
		$deleteStatus = $this->admin_model->delete_single_product($this->input->post('product_id'));
		echo json_encode($deleteStatus); 
	}
	
}
