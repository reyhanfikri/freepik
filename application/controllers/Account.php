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

	public function logout()
	{
		delete_cookie('user');
		redirect(base_url()."login_sementara");
	}

	public function register()
	{
		$this->load->view('v_register');
	}

	public function login_sementara()
	{

		if ($this->UserAccountModel->getCookie() == null){

			if ($this->input->post('submit') !== null){

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data['username'] = "";

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
					$data['username'] = $username;
					$this->load->view('v_login_sementara', $data);

				}else{

					$validation = $this->UserAccountModel->loginDataValidation($username, $password);

					if ($validation == "Username tidak ditemukan"
						|| $validation == "Password tidak benar"){

						$data['errorUsername'] = $validation;
						$data['errorPassword'] = "";
						$data['username'] = $username;
						$this->load->view('v_login_sementara', $data);

					}else {

						$this->UserAccountModel->setCookie($username);
						redirect(base_url());

					}

				}

			}else{

				$data['errorUsername'] = "";
				$data['errorPassword'] = "";
				$data['username'] = "";
				$this->load->view('v_login_sementara', $data);

			}	

		}else{

			redirect(base_url());

		}

			
	}

	public function register_sementara()
	{
		$this->load->view('v_register_sementara');
	}
}
