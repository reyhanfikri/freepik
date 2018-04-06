<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
	}

	public function login()
	{
		$this->load->view('v_login');
	}

	public function logout()
	{
		if ($this->UserAccountModel->getCookie() !== null){

			delete_cookie('user');

		}
		redirect(base_url()."login_sementara");
	}

	public function register()
	{
		$this->load->view('v_register');
	}

	public function login_sementara()
	{

		$cookie = $this->UserAccountModel->getCookie();

		if ($cookie == null){

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

					$validation = $this->UserAccountModel->login($username, $password);

					if ($validation == "Username tidak ditemukan"
						|| $validation == "Password tidak benar"){

						$data['errorUsername'] = $validation;
						$data['errorPassword'] = "";
						$data['username'] = $username;
						$this->load->view('v_login_sementara', $data);

					}else {

						$this->UserAccountModel->setCookie($username);

						$user_data = $this->UserAccountModel->getUserData($cookie);

						if ($user_data->role == "user"){

							redirect(base_url());

						}else {

							redirect(base_url()."admin");

						}

					}

				}

			}else{

				$data['errorUsername'] = "";
				$data['errorPassword'] = "";
				$data['username'] = "";
				$this->load->view('v_login_sementara', $data);

			}	

		}else{

			$user_data = $this->UserAccountModel->getUserData($cookie);

			if ($user_data->role == "user"){

				redirect(base_url());

			}else {

				redirect(base_url()."admin");

			}

		}

			
	}

	public function register_sementara()
	{
		if ($this->input->post('submit') !== null){

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$data['username'] = "";
			$data['email'] = "";

			if ($username == "" && $password == "" && $email == ""){

				$data['errorUsername'] = "Username belum diisi";
				$data['errorPassword'] = "Password belum diisi";
				$data['errorEmail'] = "Email belum diisi";
				$this->load->view('v_register_sementara', $data);

			}else if ($username == "" && $password == ""){

				$data['errorUsername'] = "Username belum diisi";
				$data['errorPassword'] = "Password belum diisi";
				$data['errorEmail'] = "";
				$data['email'] = $email;
				$this->load->view('v_register_sementara', $data);

			}else if ($username == "" && $email == ""){

				$data['errorUsername'] = "Username belum diisi";
				$data['errorPassword'] = "";
				$data['errorEmail'] = "Email belum diisi";
				$this->load->view('v_register_sementara', $data);

			}else if ($password == "" && $email == ""){

				$data['errorUsername'] = "";
				$data['errorPassword'] = "Password belum diisi";
				$data['errorEmail'] = "Email belum diisi";
				$data['username'] = $username;
				$this->load->view('v_register_sementara', $data);

			}else if ($username == ""){

				$data['errorUsername'] = "Username belum diisi";
				$data['errorPassword'] = "";
				$data['errorEmail'] = "";
				$data['email'] = $email;
				$this->load->view('v_register_sementara', $data);

			}else if ($email == ""){

				$data['errorUsername'] = "";
				$data['errorPassword'] = "";
				$data['errorEmail'] = "Email belum diisi";
				$data['username'] = $username;
				$this->load->view('v_register_sementara', $data);

			}else if ($password == ""){

				$data['errorUsername'] = "";
				$data['errorPassword'] = "Password belum diisi";
				$data['errorEmail'] = "";
				$data['username'] = $username;
				$data['email'] = $email;
				$this->load->view('v_register_sementara', $data);

			}else{

				redirect(base_url());

			}

		}else{

			$data['errorUsername'] = "";
			$data['errorPassword'] = "";
			$data['errorEmail'] = "";
			$data['username'] = "";
			$data['email'] = "";
			$this->load->view('v_register_sementara', $data);

		}
	}
}
