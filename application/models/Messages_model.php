<?php

class Messages_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_messages()
    {
        $query = $this->db->get('messages');
        return $query->result_array();
    }
}
