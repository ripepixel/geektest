<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaigns extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Recruiter_model');
		$this->Recruiter_model->isValidated();
	}


	public function create()
	{
		// check if recruiter has any credits first
		$credits = $this->Recruiter_model->recruiterHasCredits($this->session->userdata('user_id'));

		if($credits) {
			// has credits, display page
			$data['main'] = "campaigns/create";
			$this->load->view('template/template', $data);
		} else {
			// no credits, get them to purchase plan
			$this->session->set_flashdata('error', 'Please select a payment package before creating your campaign.');
			redirect('recruiters/choose_plan');
		}

	}







}