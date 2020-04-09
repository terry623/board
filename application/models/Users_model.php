<?php

class Users_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function find($account){
        $query = $this->db->get_where('users', array('account' => $account));
        return $query->result_array();
    }

    public function add($all){
        $this->db->insert('users', $all);
    }
}
