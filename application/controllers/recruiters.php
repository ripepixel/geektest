<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruiters extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Recruiter_model');
		$this->load->model('Job_model');
		$this->Recruiter_model->isValidated();
	}


	public function index()
	{
		$credits = $this->Recruiter_model->getCredits($this->session->userdata('user_id'));
		$data['credits'] = ($credits == 99999) ? 'Unlimited' : $credits;
		$data['campaigns'] = $this->Job_model->getRecruiterJobs($this->session->userdata('user_id'))
		$data['main'] = "recruiters/index";
		$this->load->view('template/template', $data);
	}

	public function choose_plan()
	{
		$this->load->model('Plan_model');
		$data['plans'] = $this->Plan_model->getActivePlans();
		$data['main'] = "recruiters/plans";
		$this->load->view('template/template', $data);
	}

	public function your_order()
	{
		$plan_id = $this->uri->segment(3);
		$this->load->model('Plan_model');
		$data['plan'] = $this->Plan_model->getPlan($plan_id);
		if($data['plan']) {			
			$data['main'] = "recruiters/your_order";
			$this->load->view('template/template', $data);
		} else {
			redirect('recruiters/choose_plan');
		}
	}

	public function process_payment()
	{
		$plan_id = $this->uri->segment(3);
		$this->load->model('Plan_model');
		$plan = $this->Plan_model->getPlan($plan_id);

		if($plan) {
			// process payment

			
			/*	Move below code to success function
				only when payment has been received, 
				or successfull payment data entered
			*/

			// add credits etc
			$this->Plan_model->addRecruiterCredits($this->session->userdata('user_id'), $plan->credits);

			// create payment record
			$purch_data = array(
				'recruiter_id' => $this->session->userdata('user_id'),
				'plan_id' => $plan->id,
				'price' => $plan->price,
				'payment_date' => time(),
				'payment_type' => 'testing'
				);
			$this->Plan_model->createPlanPurchase($purch_data);

			$this->session->set_flashdata('success', 'Thanks for your payment, please create your campaign');
			redirect('campaigns/create');
		}
	}






}