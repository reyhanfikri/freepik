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
		if ($this->input->post('submit') !== null){

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($username == "" && $password == ""){

				$data['errorUsername'] = "Username belum diisi";
				$data['errorPassword'] = "Password belum diisi";
				$this->load->view('v_login_sementara', $data);

			}else if ($username == ""){

				$data['errorUsername'] = "Username belum diisi";
				$data['errorPassword'] = "";
				$this->load->view('v_login_sementara', $data);

			}else if ($password == ""){

				$data['errorUsername'] = "";
				$data['errorPassword'] = "Password belum diisi";
				$this->load->view('v_login_sementara', $data);

			}else{

				redirect(base_url());

			}

		}else{

			$data['errorUsername'] = "";
			$data['errorPassword'] = "";
			$this->load->view('v_login_sementara', $data);

		}		
	}

	public function register_sementara()
	{
		$this->load->view('v_register_sementara');
	}
}
