<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Launch extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Candidate_model');
		$this->load->model('Recruiter_model');
	}


	public function recruiters()
	{
		$data['main'] = "launch/recruiters";
		$this->load->view('template/template', $data);
	}

	public function candidates()
	{
		$data['main'] = "launch/candidates";
		$this->load->view('template/template', $data);
	}



	
	public function login()
	{
		$data['main'] = "front/launch/login";
		$this->load->view('front/template/template', $data);
	}
	
	public function candidate_login()
	{
		$this->form_validation->set_rules('log_email', 'Email address', 'required|valid_email');
		$this->form_validation->set_rules('log_password', 'Password', 'required');
		
		if($this->form_validation->run() == false) {
			$error_msg = "There were errors logging you in. Please check your email address and password are correct.";
			$data['main'] = "launch/candidates";
			$this->load->view('template/template', $data);
		} else {
			// check login details
			$email = $this->input->post('log_email');
			$pass = $this->input->post('log_password');
			$sec_pass = md5($pass); // secure password before transmitting
			$result = $this->Candidate_model->validateCandidate($email, $sec_pass);
			if($result) {				
				$this->session->set_flashdata('success', 'You are logged in');
				redirect('candidates');
			} else {
				// login errors
				$this->session->set_flashdata('error', 'There were errors logging you in. Please check your email address and password are correct');
				redirect('launch/candidates');
			}
		}
		
	}
	

	public function candidate_register()
	{
		$this->form_validation->set_rules('reg_email', 'Email address', 'required|valid_email|is_unique[candidates.email]');
		$this->form_validation->set_rules('reg_password', 'Password', 'required|min_length[6]');

		$this->form_validation->set_message('is_unique', 'The %s is already being used.');
		
		if($this->form_validation->run() == false) {
			$error_msg = "There were errors creating your account.";
			$data['main'] = "launch/candidates";
			$this->load->view('template/template', $data);
		} else {

			// create account
			$email = $this->input->post('reg_email');
			$pass = $this->input->post('reg_password');
			$sec_pass = md5($pass);
			
			// generate confirmation code to send in email
			$conf_code = sha1($email);
			$is_confirmed = 0;

			$this->Candidate_model->createCandidate($email, $sec_pass, $conf_code, $is_confirmed);

			// send email to new candidate - ask to confirm email

			$this->session->set_flashdata('success', 'Great, your account has been created. Please check your email to confirm your details');
			redirect('launch/candidates');
		}
	}
	
	public function recruiter_login()
	{
		$this->form_validation->set_rules('log_email', 'Email address', 'required|valid_email');
		$this->form_validation->set_rules('log_password', 'Password', 'required');
		
		if($this->form_validation->run() == false) {
			$error_msg = "There were errors logging you in. Please check your email address and password are correct.";
			$data['main'] = "launch/recruiters";
			$this->load->view('template/template', $data);
		} else {
			// check login details
			$email = $this->input->post('log_email');
			$pass = $this->input->post('log_password');
			$sec_pass = md5($pass); // secure password before transmitting
			$result = $this->Recruiter_model->validateRecruiter($email, $sec_pass);
			if($result) {				
				$this->session->set_flashdata('success', 'You are logged in');
				redirect('recruiters');
			} else {
				// login errors
				$this->session->set_flashdata('error', 'There were errors logging you in. Please check your email address and password are correct');
				redirect('launch/recruiters');
			}
		}
		
	}
	

	public function recruiter_register()
	{
		$this->form_validation->set_rules('reg_email', 'Email address', 'required|valid_email|is_unique[recruiters.email]');
		$this->form_validation->set_rules('reg_password', 'Password', 'required|min_length[6]');

		$this->form_validation->set_message('is_unique', 'The %s is already being used.');
		
		if($this->form_validation->run() == false) {
			$error_msg = "There were errors creating your account.";
			$data['main'] = "launch/recruiters";
			$this->load->view('template/template', $data);
		} else {

			// create account
			$email = $this->input->post('reg_email');
			$pass = $this->input->post('reg_password');
			$sec_pass = md5($pass);
			
			// generate confirmation code to send in email
			$conf_code = sha1($email);
			$is_confirmed = 0;

			$this->Recruiter_model->createRecruiter($email, $sec_pass, $conf_code, $is_confirmed);

			// send email to new candidate - ask to confirm email

			$this->session->set_flashdata('success', 'Great, your account has been created. Please check your email to confirm your details');
			redirect('launch/recruiters');
		}
	}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'You have now logged out');
		redirect();
	}
	



	// form call-back for select box (single entry)
	function check_default($post_string)
	{
	  return $post_string == '' ? FALSE : TRUE;
	}
	

}
