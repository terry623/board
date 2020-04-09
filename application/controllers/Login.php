<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('url');
		$this->load->helper('cookie');
	}

	public function index()
	{
		if (!empty($this->input->cookie("account"))) {
			redirect(base_url('Main'));
		} else {
			$this->load->view('login');
		}
	}

	public function submit()
	{
		$all = $this->input->post();
		$result = $this->users_model->find($all['account']);

		// 沒有帳號，因此註冊它
		if (empty($result)) {
			$this->users_model->add($all);
			$this->input->set_cookie("account", $all['account'], 86400);
			redirect(base_url('Main'));
		}
		// 有帳號，確認密碼是否正確
		else {
			if ($result[0]['password'] == $all['password']) {
				$this->input->set_cookie("account", $all['account'], 86400);
				redirect(base_url('Main'));
			} else {
				$data['msg'] = '訊息：密碼錯誤';
				$this->load->view('login', $data);
			}
		}
	}
}
