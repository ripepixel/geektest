<?php

class Candidate_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function createCandidate($email, $pass, $conf_code, $is_confirmed)
    {
        // create the user
        $data = array(
            'email' => $email,
            'password' => $pass,
            'confirm_code' => $conf_code,
            'is_confirmed' => $is_confirmed,
            'created_at' => time()
            );
        $this->db->insert('candidates', $data);
        
        return TRUE;
        
    }

    function validateCandidate($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $q = $this->db->get('candidates');
        
        if($q->num_rows() == 1) {
            $row = $q->row();
            $data = array(
                'user_id' => $row->id,
                'user_type' => 'candidate'
            );

            $this->session->set_userdata($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function isValidated()
    {
        # check a user is logged in
        if(!$this->session->userdata('user_type')) {
            $this->session->set_flashdata('error', 'Please log in first');
            redirect('launch/candidates');
        }
    }

    function isValidCandidate()
    {
        if($this->session->userdata('user_type')) {
           if($this->session->userdata('user_type') == "candidate") {
                return TRUE;
           } else {
                $this->session->set_flashdata('error', 'Please log in first');
                redirect('launch/candidates');
           } 
        }
    }

    function candidateHasProfile($uid)
    {
        $this->db->where('candidate_id', $uid);
        $q = $this->db->get('profiles');

        if($q->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

/*

    function validateUser($email, $password)
    {
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$q = $this->db->get('users');
			if($q->num_rows() == 1) {
				$row = $q->row();

				$outlet = '';
	            
	            // get user type
	            if($row->is_manager) {
	            	$user_type = 'manager';
	            } elseif ($row->is_employee) {
	            	$user_type = 'employee';
	            	// get employee outlet
	            	$outlet = $this->Outlet_model->getEmployeeOutlet($row->id);

	            } elseif ($row->is_client) {
	            	$user_type = 'client';
	            }

	    		$data = array(
	    			'user_id' => $row->id,
	    			'user_type' => $user_type,
	    			'outlet' => $outlet
	    		);
    			$this->session->set_userdata($data);

    			// set last login
    			$this->setLastLogin($row->id);

				return TRUE;
			} else {
				return FALSE;
			}
			
    }

    function isValidated()
    {
    	# check a user is logged in
    	if(!$this->session->userdata('user_type')) {
    		redirect('launch/login');
    	}
    }

    function isManager()
    {
    	if(!$this->session->userdata('user_type') == 'manager') {
    		// if employee - redirect to outlet dashboard
            // if client - redirect to client details dashboard

            // else just redirect to login page
            redirect('launch/login');
    	}
    }

		function createEmployeeUser($data)
		{
			$this->db->insert('users', $data);
      $uid = $this->db->insert_id();
			return $uid;
		}
    
	

    function setLastLogin($id)
    {
    	$this->db->where('id', $id);
    	$data = array(
    		'last_login' => time()
    		);

    	$this->db->update('users', $data);
    	return TRUE;
    }

    function getUserPlan($uid)
    {
        $this->db->where('id', $uid);
        $q = $this->db->get('users');
        $row = $q->row();

        return $row->plan_id;
    }

    function getUserBusiness($uid)
    {
        $this->db->where('id', $uid);
        $q = $this->db->get('businesses');
        $row = $q->row();

        return $row->id;
    }


    function hasPermission($uid, $function)
    {
        $this->db->where('user_id', $uid);
        $this->db->where($function, 1);

        $q = $this->db->get('user_permissions');
        if($q->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function createManagerPermissions($uid)
    {
        // give the manager full permissions on creation of account
        $data = array(
            'user_id' => $uid,
            'create_outlet' => 1,
            'edit_outlet' => 1,
            'delete_outlet' => 1
            );
        $this->db->insert('user_permissions', $data);
        return TRUE;
    }

    function checkCanCreate($table, $field, $uid)
    {
        $bus_id = $this->getUserBusiness($uid);
        $plan_id = $this->getUserPlan($uid);

        $this->db->where('business_id', $bus_id);
        $q = $this->db->get($table);
        $count = $q->num_rows();

        $this->db->where('id', $plan_id);
        $q = $this->db->get('plans');
        $plan = $q->row();

        if(($count+1) > $plan->$field) {
            return FALSE;
        } else {
            return TRUE;
        }

    }

*/

}