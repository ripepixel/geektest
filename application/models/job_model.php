<?php

class Job_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function getJobTypes($active = FALSE)
    {
    	if($active) {
    		$this->db->where('is_active', 1);
    	}

    	$q = $this->db->get('job_types');

    	if($q->num_rows() > 0) {
    		return $q->result_array();
    	} else {
    		return FALSE;
    	}
    }

    function getSalaryTypes($active = NULL)
    {
    	if($active) {
    		$this->db->where('is_active', 1);
    	}

    	$q = $this->db->get('salary_types');

    	if($q->num_rows() > 0) {
    		return $q->result_array();
    	} else {
    		return FALSE;
    	}
    }

		function createJob($data)
		{
			$this->db->insert('jobs', $data);
			return true;
		}
		
		function getRecruiterJobs($rid)
		{
			//$this->db->where('recruiter_id', $rid);
			
		}




}