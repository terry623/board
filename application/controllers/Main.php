<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('messages_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['messages'] = $this->messages_model->get_all();
		$this->load->view('messages', $data);
	}

	public function addMessage()
	{
		$all = $this->input->post();
        $this->messages_model->add($all);
	}

	public function addReply(){
		$all = $this->input->post();
		print_r($all);
	}

	public function removeMessage($id)
	{
		$this->messages_model->remove($id);
	}
}
