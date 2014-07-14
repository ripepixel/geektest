<?php

class Profile_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function createProfile($data)
    {
			
			$this->db->insert('profiles', $data);
			
			return true;
    }


}