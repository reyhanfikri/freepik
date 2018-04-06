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

					$data['error1'] = "Username belum diisi";
					$data['error2'] = "Password belum diisi";
					$this->load->view('v_login_sementara', $data);

				}else if ($username == ""){

					$data['error1'] = "Username belum diisi";
					$data['error2'] = "";
					$this->load->view('v_login_sementara', $data);

				}else if ($password == ""){

					$data['error1'] = "";
					$data['error2'] = "Password belum diisi";
					$data['username'] = $username;
					$this->load->view('v_login_sementara', $data);

				}else{

					$validation = $this->UserAccountModel->login($username, $password);

					if ($validation == "Username tidak ditemukan"
						|| $validation == "Password tidak benar"){

						$data['error1'] = $validation;
						$data['error2'] = "";
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

				$data['error1'] = "";
				$data['error2'] = "";
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

		$data['error1'] = "";
		$data['error2'] = "";
		$data['error3'] = "";
		$data['username'] = "";
		$data['email'] = "";

		if ($this->input->post('submit') !== null){

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');

			if ($username == "" && $password == "" && $email == ""){

				$data['error1'] = "Username belum diisi";
				$data['error2'] = "Password belum diisi";
				$data['error3'] = "Email belum diisi";
				$this->load->view('v_register_sementara', $data);

			}else if ($username == "" && $password == ""){

				$data['error1'] = "Username belum diisi";
				$data['error2'] = "Password belum diisi";
				$data['email'] = $email;
				$this->load->view('v_register_sementara', $data);

			}else if ($username == "" && $email == ""){

				$data['error1'] = "Username belum diisi";
				$data['error3'] = "Email belum diisi";
				$this->load->view('v_register_sementara', $data);

			}else if ($password == "" && $email == ""){

				$data['error2'] = "Password belum diisi";
				$data['error3'] = "Email belum diisi";
				$data['username'] = $username;
				$this->load->view('v_register_sementara', $data);

			}else if ($username == ""){

				$data['error1'] = "Username belum diisi";
				$data['email'] = $email;
				$this->load->view('v_register_sementara', $data);

			}else if ($email == ""){

				$data['error3'] = "Email belum diisi";
				$data['username'] = $username;
				$this->load->view('v_register_sementara', $data);

			}else if ($password == ""){

				$data['error2'] = "Password belum diisi";
				$data['username'] = $username;
				$data['email'] = $email;
				$this->load->view('v_register_sementara', $data);

			}else{

				if ($this->UserAccountModel->getUserData($username) == null){

					if ($this->UserAccountModel->getUserDatabyEmail($email) == null){

						redirect(base_url());

					}else {

						$data['error3'] = "Email sudah digunakan";
						$this->load->view('v_register_sementara', $data);

					}

				}else {

					$data['error3'] = "Username sudah digunakan";
					$this->load->view('v_register_sementara', $data);

				}

			}

		}else{

			$this->load->view('v_register_sementara', $data);

		}
	}
}
