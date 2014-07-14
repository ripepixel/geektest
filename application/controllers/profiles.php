<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Candidate_model');
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
		// check it is the profile owner of a recruiter with access
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
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
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
				
			}
		}
	}

	public function update_profile()
	{
		// check it is the profile owner
	}
	


}