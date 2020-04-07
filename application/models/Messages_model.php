<?php

class Messages_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $query = $this->db->get('messages');
        return $query->result_array();
    }

    public function add($all){
        $this->db->insert('messages', $all);
        redirect(base_url('Main'));
    }

    public function remove($id){
        $this->db->delete('messages', array('id' => $id)); 
        redirect(base_url('Main'));
    }
}
