<?php

class Recruiter_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function createRecruiter($email, $pass, $conf_code, $is_confirmed)
    {
        // create the user
        $data = array(
            'email' => $email,
            'password' => $pass,
            'confirm_code' => $conf_code,
            'is_confirmed' => $is_confirmed,
            'created_at' => time()
            );
        $this->db->insert('recruiters', $data);
        
        return TRUE;
        
    }

    function validateRecruiter($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $q = $this->db->get('recruiters');
        
        if($q->num_rows() == 1) {
            $row = $q->row();

            // get plan id
            $this->db->where('recruiter_id', $row->id);
            $pq = $this->db->get('plan_purchases');
            
            if($pq->num_rows() == 1) {
                $plan_row = $pq->row();
                $plan_id = $plan_row->plan_id;
            } else {
                $plan_id = NULL;
            }
           
            // create session array
            $data = array(
                'user_id' => $row->id,
                'user_email' => $row->email,
                'user_type' => 'recruiter',
                'plan_id' => $plan_id
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
            redirect('launch/recruiters');
        }
    }

    function recruiterHasCredits($uid)
    {
        $this->db->where('id', $uid);
        $q = $this->db->get('recruiters');

        $row = $q->row();

        if($row->credits > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getCredits($uid)
    {
        $this->db->where('id', $uid);
        $q = $this->db->get('recruiters');

        $row = $q->row();

        if($row->credits > 0) {
            return $row->credits;
        } else {
            return 0;
        }
    }

		function decreaseCredits($uid, $amt)
		{
			$this->db->where('id', $uid);
			$q = $this->db->get('recruiters');
			if($q->num_rows() == 1) {
				$row = $q->row();
				
				$new_credits = $q->credits - $amt;
				
				$this->db->where('id', $uid);
				$data = array('credits' => $new_credits);
				$this->db->update('recruiters', $data);
				
				return true;
			} else {
				return false;
			}
		}



}