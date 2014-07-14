<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Candidate_model');
		$this->load->model('Profile_model');
		// need to check that it is either the profile owner
		// or that it is a recruiter who has access to the 
		// profiles
	}


	public function index()
	{
		// maybe a search page for all profiles / CV's
	}

	public function view()
	{
		// check it is the profile owner or a recruiter with access
	}

	public function create_profile()
	{
		// check it is a candidate accessing the page
		if($this->Candidate_model->isValidCandidate()) {
			// check if candidate already has a profile - display edit profile page if has
			if($this->Candidate_model->candidateHasProfile($this->session->userdata('user_id'))) {
				// redirect to edit profile
			} else {
				// create new profile
				$data['extra_css'] = '<link rel="stylesheet" href="'.base_url().'css/jquery-te-1.4.0.css">';
				$data['extra_scripts'] = '<script src="'.base_url().'js/jquery-te-1.4.0.min.js"></script>
					<script>
						var jqteSettings = {
							color: false,
							fsize: false,
							sub: false,
							sup: false,
							outdent: false,
							indent: false,
							left: false,
							right: false,
							center: false,
							strike: false
						};
						$("#skills").jqte(jqteSettings);
						$("#bio").jqte(jqteSettings);
						$("#quals").jqte(jqteSettings);
						$("#work_history").jqte(jqteSettings);
						$("#more_info").jqte(jqteSettings);
					</script>
				';
				$data['main'] = "profiles/create_profile";
				$this->load->view('template/template', $data);
			}
		}
		
	}

	public function save_profile()
	{
		if($this->Candidate_model->isValidCandidate()) {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('telephone', 'Telephone', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('bio', 'About You', 'required');
			$this->form_validation->set_rules('skills', 'Your Skills', 'required');
			$this->form_validation->set_rules('quals', 'Qualifications', 'required');
			$this->form_validation->set_rules('work_history', 'Work history', 'required');
			$this->form_validation->set_rules('more_info', 'Additional Info', 'required');

			if($this->form_validation->run() == false) {
				$data['extra_css'] = '<link rel="stylesheet" href="'.base_url().'css/jquery-te-1.4.0.css">';
				$data['extra_scripts'] = '<script src="'.base_url().'js/jquery-te-1.4.0.min.js"></script>
					<script>
						var jqteSettings = {
							color: false,
							fsize: false,
							sub: false,
							sup: false,
							outdent: false,
							indent: false,
							left: false,
							right: false,
							center: false,
							strike: false
						};
						$("#skills").jqte(jqteSettings);
						$("#bio").jqte(jqteSettings);
						$("#quals").jqte(jqteSettings);
						$("#work_history").jqte(jqteSettings);
						$("#more_info").jqte(jqteSettings);
					</script>
				';
				$data['main'] = "profiles/create_profile";
				$this->load->view('template/template', $data);
			} else {
				// get data and save it
				if($this->input->post('dob')) {
					$dob = DateTime::createFromFormat('d/m/Y', $this->input->post('dob'));
					$dob_date = $date->format('Y-m-d');
				} else {
					$dob_date = '';
				}
				
				$data = array(
					'candidate_id' => $this->session->userdata('user_id'),
					'full_name' => $this->input->post('full_name'),
					'address' => nl2br($this->input->post('address')),
					'telephone' => $this->input->post('telephone'),
					'email' => $this->input->post('email'),
					'dob' => $dob_date,
					'gender' => $this->input->post('gender'),
					'bio' => $this->input->post('bio'),
					'skills' => $this->input->post('skills'),
					'qualifications' => $this->input->post('quals'),
					'work_history' => $this->input->post('work_history'),
					'more_info' => $this->input->post('more_info'),
					'created_at' => date('Y-m-d')
				);
				
				$this->Profile_model->createProfile($data);
				$this->session->set_flashdata('success', 'Great, you have created your profile');
				redirect('candidates');
			}
		}
	}

	public function update_profile()
	{
		// check it is the profile owner
	}
	


}