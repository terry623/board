<?php

class Replies_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $query = $this->db->get('replies');
        return $query->result_array();
    }

    public function add($all){
        $this->db->insert('replies', $all);
        redirect(base_url('Main'));
    }

    public function remove($id){
        $this->db->delete('replies', array('id' => $id)); 
        redirect(base_url('Main'));
    }
}
