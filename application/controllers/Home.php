<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('home_model'); 
	}
	public function index()
	{
		$data['title'] = "Bettwäsche & Tischwäsche";
		$data['products'] = $this->home_model->get_all_products();
		$data['color1'] = $this->home_model->get_all_colors();
		$data['design_type'] = $this->home_model->get_filter_type('p_design_type1');
		
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/home',$data);
		$this->load->view('frontend/footer',$data);
	}
	
	public function fetch_data(){
		$color = $this->input->post('color');
		/*$color2 = $this->input->post('color2');
		$color3 = $this->input->post('color3');*/
		$design_type = $this->input->post('design_type');
		
		$product_list = $this->home_model->fetch_data($color, $design_type);
		echo json_encode($product_list); 
	}
	
}