<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruiters extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Recruiter_model');
		$this->Recruiter_model->isValidated();
	}


	public function index()
	{
		$data['main'] = "recruiters/index";
		$this->load->view('template/template', $data);
	}







}