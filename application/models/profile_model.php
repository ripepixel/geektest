<?php

class Profile_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getCandidateProfile($cid)
    {
        $this->db->where('candidate_id', $cid);
        $q = $this->db->get('profiles');

        if($q->num_rows() == 1) {
            $row = $q->row();
            return $row;
        } else {
            return false;
        }
    }


    function createProfile($data)
    {
			
		$this->db->insert('profiles', $data);
			
		return true;
    }

    function updateProfile($cid, $data)
    {
        $this->db->where('candidate_id', $cid);
        $this->db->update('profiles', $data);

        return true;
    }


}