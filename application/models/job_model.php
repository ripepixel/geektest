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
			$this->db->where('recruiter_id', $rid);
			$this->db->where('is_active', 1);

            $q = $this->db->get('jobs');

            if($q->num_rows() > 0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
		}

        function getExpiryDateFromPlanDays($pid)
        {
            $this->db->where('id', $pid);
            $q = $this->db->get('plans');

            if($q->num_rows() == 1) {
                $row = $q->row();
                return $row->job_days;
            } else {
                return 30; // default to 30 days incase plan has been deleted
            }
        }

        function getRecruiterJobsByExpiry($rid)
        {
            $this->db->select('j.id, j.title, j.location, j.salary_from, j.salary_to, j.expiry_date, t.name AS test_name');
            $this->db->from('jobs AS j');
            $this->db->join('tests AS t', 't.id = j.test_id', 'LEFT');
            $this->db->where('j.recruiter_id', $rid);
            $this->db->where('j.is_active', 1);
            $this->db->order_by('j.expiry_date', 'ASC');

            $q = $this->db->get();
            if($q->num_rows() > 0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }

        function getLatestJobs()
        {
            $this->db->select('j.id, j.title, j.location, j.salary_from, j.salary_to, j.expiry_date, t.name AS test_name, jt.name AS job_type, st.name AS salary_type, st.per_name AS per_name');
            $this->db->from('jobs AS j');
            $this->db->join('tests AS t', 't.id = j.test_id', 'LEFT');
            $this->db->join('job_types AS jt', 'jt.id = j.job_type_id', 'LEFT');
            $this->db->join('salary_types AS st', 'st.id = j.salary_type_id', 'LEFT');
            $this->db->where('j.is_active', 1);
            $this->db->order_by('j.created_at', 'DESC');

            $q = $this->db->get();
            if($q->num_rows() > 0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }

				function jobBelongsToRecruiter($jid, $rid)
				{
					$this->db->where('id', $jid);
					$this->db->where('recruiter_id', $rid);
					$this->db->where('is_active', 1);
					$q = $this->db->get('jobs');
					
					if($q->num_rows() == 1) {
						return $q->row();
					} else {
						return FALSE;
					}
				}

				function getJob($jid)
				{
					$this->db->where('id', $jid);
					$this->db->where('is_active', 1);
					$q = $this->db->get('jobs');
					
					if($q->num_rows() == 1) {
						return $q->row();
					} else {
						return FALSE;
					}
				}




}