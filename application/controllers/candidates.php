<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidates extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Candidate_model');
		$this->Candidate_model->isValidated();
	}


	public function index()
	{
		$data['main'] = "candidates/index";
		$this->load->view('template/template', $data);
	}

	public function create_profile()
	{
		$data['main'] = "candidates/create_profile";
		$this->load->view('template/template', $data);
	}






}