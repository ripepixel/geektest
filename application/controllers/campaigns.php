<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaigns extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Recruiter_model');
		$this->load->model('Job_model');
		$this->load->model('Test_model');
		$this->Recruiter_model->isValidated();
	}


	public function create()
	{
		// check if recruiter has any credits first
		$credits = $this->Recruiter_model->recruiterHasCredits($this->session->userdata('user_id'));

		if($credits) {
			// has credits, display page
			$data['job_types'] = $this->Job_model->getJobTypes(TRUE);
			$data['salary_types'] = $this->Job_model->getSalaryTypes(TRUE);
			$data['tests'] = $this->Test_model->getTests(TRUE);
			// get expiry date from plan job_days
			$exp_days = $this->Job_model->getExpiryDateFromPlanDays($this->session->userdata('plan_id'));
			$expiry_date = strtotime("+".$exp_days." day");
			$data['expiry_date'] = date("d/m/Y", $expiry_date);

			$data['main'] = "campaigns/create";
			$this->load->view('template/template', $data);
		} else {
			// no credits, get them to purchase plan
			$this->session->set_flashdata('error', 'Please select a payment package before creating your campaign.');
			redirect('recruiters/choose_plan');
		}

	}
	
	public function edit()
	{
		$jid = $this->uri->segment(3); // get job id
		// check job belongs to recruiter
		if($this->Job_model->jobBelongsToRecruiter($jid, $this->session->userdata('user_id'))) {
			// get job details
			$data['job'] = $this->Job_model->getJob($jid);
			$data['job_types'] = $this->Job_model->getJobTypes(TRUE);
			$data['salary_types'] = $this->Job_model->getSalaryTypes(TRUE);
			$data['tests'] = $this->Test_model->getTests(TRUE);
			// get expiry date from plan job_days
			$exp_days = $this->Job_model->getExpiryDateFromPlanDays($this->session->userdata('plan_id'));
			$expiry_date = strtotime("+".$exp_days." day");
			$data['expiry_date'] = date("d/m/Y", $expiry_date);

			$data['main'] = "campaigns/edit";
			$this->load->view('template/template', $data);
		} else {
			$this->session->set_flashdata('error', 'You can not access those details you cheeky monkey!');
			redirect('recruiters/');
		}
	}
	
	public function save_campaign()
	{
		// validate input
		$this->form_validation->set_rules('title', 'Job Title', 'required');
		$this->form_validation->set_rules('location', 'Job Location', 'required');
		$this->form_validation->set_rules('salary_type', 'Salary Type', 'required');
		$this->form_validation->set_rules('salary_from', 'Salary From', 'required');
		$this->form_validation->set_rules('salary_to', 'Salary To', 'required');
		$this->form_validation->set_rules('job_type', 'Job Type', 'required');
		$this->form_validation->set_rules('details', 'Job Details', 'required');
		$this->form_validation->set_rules('expiry_date', 'Job Expiry Date', 'required');
		$this->form_validation->set_rules('test', 'Test', 'required');
		$this->form_validation->set_rules('report_email', 'Report Email Address', 'required|valid_email');
		
		if($this->form_validation->run() == FALSE) {
			$data['job_types'] = $this->Job_model->getJobTypes(TRUE);
			$data['salary_types'] = $this->Job_model->getSalaryTypes(TRUE);
			$data['tests'] = $this->Test_model->getTests(TRUE);
			// get expiry date from plan job_days
			$exp_days = $this->Job_model->getExpiryDateFromPlanDays($this->session->userdata('plan_id'));
			$expiry_date = strtotime("+".$exp_days." day");
			$data['expiry_date'] = date("d/m/Y", $expiry_date);
			$data['main'] = "campaigns/create";
			$this->load->view('template/template', $data);
			
		} else {
			// if expiry date is > plan date limit, set to today's date plus limit days
			
			// format date
			$date = DateTime::createFromFormat('d/m/Y', $this->input->post('expiry_date'));
			$expiry_date = $date->format('Y-m-d');
			
			// create job
			$data = array(
				'recruiter_id' => $this->session->userdata('user_id'),
				'test_id' => $this->input->post('test'),
				'title' => $this->input->post('title'),
				'location' => $this->input->post('location'),
				'salary_type_id' => $this->input->post('salary_type'),
				'salary_from' => $this->input->post('salary_from'),
				'salary_to' => $this->input->post('salary_to'),
				'job_type_id' => $this->input->post('job_type'),
				'details' => nl2br($this->input->post('details')),
				'expiry_date' => $expiry_date,
				'report_email' => $this->input->post('report_email'),
				'is_active' => 1,
				'created_at' => date('Y-m-d H:i:s', time())
			);
			
			$this->Job_model->createJob($data);
			
			// reduce credits by 1, unless they have unlimited (99999)
			$credits = $this->Recruiter_model->getCredits($this->session->userdata('user_id'));
			if($credits != 99999)
				$this->Recruiter_model->decreaseCredits($this->session->userdata('user_id'), 1);
				
			$this->session->set_flashdata('success', 'Your new campaign has been saved and is now live on the site.');
			redirect('recruiters');
			
		}
	}







}