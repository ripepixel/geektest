<?php

class Test_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function getTests($active = FALSE)
    {
    	if($active) {
    		$this->db->where('is_active', 1);
    	}

    	$q = $this->db->get('tests');

    	if($q->num_rows() > 0) {
    		return $q->result_array();
    	} else {
    		return FALSE;
    	}
    }




}