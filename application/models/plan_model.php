<?php

class Plan_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function getActivePlans()
    {
    	$this->db->where('is_active', 1);
    	$q = $this->db->get('plans');

    	if($q->num_rows() > 0) {
    		return $q->result_array();
    	} else {
    		return FALSE;
    	}
    }

    function getPlan($pid)
    {
    	$this->db->where('id', $pid);
    	$this->db->where('is_active', 1);
    	$q = $this->db->get('plans');
    	if($q->num_rows() > 0) {
    		$row = $q->row();
    		return $row;
    	} else {
    		return FALSE;
    	}
    }

    function addRecruiterCredits($uid, $credits)
    {
    	$data = array(
    		'credits' => $credits
    		);
    	$this->db->where('id', $uid);
    	$this->db->update('recruiters', $data);

    	return true;
    }

    function createPlanPurchase($data)
    {
    	$this->db->insert('plan_purchases', $data);

    	return true;
    }


}