<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('messages_model');
		$this->load->model('replies_model');
		$this->load->helper('url');
		$this->load->helper('cookie');
	}

	public function index()
	{
		if (empty($this->input->cookie("account"))) {
			redirect(base_url('Login'));
		}
		$data['messages'] = $this->messages_model->get_all();
		$data['replies'] = $this->replies_model->get_all();
		$this->load->view('messages', $data);
	}

	public function addMessage()
	{
		$all = $this->input->post();
		$all['author'] = $this->input->cookie("account");
		$this->messages_model->add($all);
	}

	public function addReply()
	{
		$all = $this->input->post();
		$all['author'] = $this->input->cookie("account");
		$this->replies_model->add($all);
	}

	public function removeMessage($id)
	{
		$this->messages_model->remove($id);
	}
}
