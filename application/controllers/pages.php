<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		$data['main'] = "pages/index";
		$this->load->view('template/template', $data);
	}
	
	public function pricing()
	{
		$data['main'] = "pages/pricing";
		$this->load->view('template/template', $data);
	}

	
	
	
}
