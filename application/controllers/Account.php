<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
	}

	public function login()
	{
		$cookie = $this->UserAccountModel->getCookie();

		if ($cookie == null){

			$data['error'] = "";
			$data['username'] = "";
			$data['paddingtop'] = 90;

			if ($this->input->post('submit') !== null){

				$username = $this->input->post('username');
				$password = $this->input->post('password');

				if ($username == "" && $password == ""){

					$data['error'] = "Perhatian! Username dan Password belum diisi.";
					$data['paddingtop'] = 60;
					$this->load->view('v_login', $data);

				}else if ($username == ""){

					$data['error'] = "Perhatian! Username belum diisi.";
					$data['paddingtop'] = 60;
					$this->load->view('v_login', $data);

				}else if ($password == ""){

					$data['error'] = "Perhatian! Password belum diisi.";
					$data['paddingtop'] = 60;
					$data['username'] = $username;
					$this->load->view('v_login', $data);

				}else{

					$validation = $this->UserAccountModel->login($username, $password);

					if ($validation == "Perhatian! Username tidak ditemukan"
						|| $validation == "Perhatian! Password tidak benar"){

						$data['error'] = $validation;
						$data['paddingtop'] = 60;
						$data['username'] = $username;
						$this->load->view('v_login', $data);

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

				$this->load->view('v_login', $data);

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

	public function logout()
	{
		if ($this->UserAccountModel->getCookie() !== null){

			delete_cookie('user');

		}
		redirect(base_url()."login");
	}

	public function register()
	{
		$cookie = $this->UserAccountModel->getCookie();

		if ($cookie == null){

			$data['error'] = "";
			$data['username'] = "";
			$data['email'] = "";
			$data['register'] = "";
			$data['paddingtop'] = 55;

			if ($this->input->post('submit') !== null){

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');

				if ($username == "" && $password == "" && $email == ""){

					$data['error'] = "Perhatian! Email, Username dan Password<br>belum diisi.";
					$data['paddingtop'] = 25;
					$this->load->view('v_register', $data);

				}else if ($username == "" && $password == ""){

					$data['error'] = "Perhatian! Username dan Password belum<br>diisi.";
					$data['email'] = $email;
					$data['paddingtop'] = 25;
					$this->load->view('v_register', $data);

				}else if ($username == "" && $email == ""){

					$data['error'] = "Perhatian! Email dan Username belum<br>diisi.";
					$data['paddingtop'] = 25;
					$this->load->view('v_register', $data);

				}else if ($password == "" && $email == ""){

					$data['error'] = "Perhatian! Email dan Password belum<br>diisi.";
					$data['username'] = $username;
					$data['paddingtop'] = 25;
					$this->load->view('v_register', $data);

				}else if ($username == ""){

					$data['error'] = "Perhatian! Username belum diisi.";
					$data['email'] = $email;
					$data['paddingtop'] = 25;
					$this->load->view('v_register', $data);

				}else if ($email == ""){

					$data['error'] = "Perhatian! Email belum diisi.";
					$data['username'] = $username;
					$data['paddingtop'] = 25;
					$this->load->view('v_register', $data);

				}else if ($password == ""){

					$data['error'] = "Perhatian! Password belum diisi.";
					$data['username'] = $username;
					$data['email'] = $email;
					$data['paddingtop'] = 25;
					$this->load->view('v_register', $data);

				}else{

					if ($this->UserAccountModel->getUserData($username) == null){

						if ($this->UserAccountModel->getUserDatabyEmail($email) == null){

							$this->UserAccountModel->insertData($email, $username, $password);
							$data['register'] = "Register sukses!";
							$this->load->view('v_register', $data);

						}else {

							$data['error'] = "Perhatian! Email sudah digunakan.";
							$data['paddingtop'] = 25;
							$this->load->view('v_register', $data);

						}

					}else {

						$data['error'] = "Perhatian! Username sudah digunakan.";
						$data['paddingtop'] = 25;
						$this->load->view('v_register', $data);

					}

				}

			}else{

				$this->load->view('v_register', $data);

			}

		}else {

			$user_data = $this->UserAccountModel->getUserData($cookie);

			if ($user_data->role == "user"){

				redirect(base_url());

			}else {

				redirect(base_url()."admin");

			}

		}
		
	}

	/*public function login_sementara()
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
		$data['register'] = "";

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

						$this->UserAccountModel->insertData($email, $username, $password);
						$data['register'] = "Register sukses!";
						$this->load->view('v_register_sementara', $data);

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
	}*/
}
