<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->load->view('v_login');
	}

	public function register()
	{
		$this->load->view('v_register');
	}

	public function login_sementara()
	{
		$this->load->view('v_login_sementara');
	}

	public function register_sementara()
	{
		$this->load->view('v_register_sementara');
	}
}
