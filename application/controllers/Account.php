<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk manajemen akun
*/
class Account extends CI_Controller {

	/**
	* Metode konstruktor
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('UserModel', 'AccountModel', 'CookieModel'));
	}

	/**
	* Metode default
	* URL : http://localhost/freepik/account
	* TIDAK TERPAKAI
	*/
	public function index()
	{
	}

	/**
	* Metode untuk login user dan login admin
	* URL : http://localhost/freepik/login
	*/
	public function login()
	{
		$cookie = $this->CookieModel->getCookie();

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

					$validation = $this->AccountModel->login($username, $password);

					if ($validation == "Perhatian! Username tidak ditemukan"
						|| $validation == "Perhatian! Password tidak benar"){

						$data['error'] = $validation;
						$data['paddingtop'] = 60;
						$data['username'] = $username;
						$this->load->view('v_login', $data);

					}else {

						$user_data = $this->UserModel->getUserData($username);

						$this->CookieModel->setCookie($username, $user_data->id);

						if ($user_data->id_role == 1){
							/*
							* Jika user adalah user biasa
							*/

							redirect(site_url());

						}else {
							/*
							* Jika user adalah user admin
							*/

							redirect(site_url('admin'));

						}

					}

				}

			}else{

				$this->load->view('v_login', $data);

			}	

		}else{

			$user_data = $this->UserModel->getUserData($cookie);

			if ($user_data->id_role == 1){
				/*
				* Jika user adalah user biasa
				*/

				redirect(site_url());

			}else {
				/*
				* Jika user adalah user admin
				*/

				redirect(site_url('admin'));

			}

		}
	}

	/**
	* Metode untuk proses logout
	*/
	public function logout()
	{
		if ($this->CookieModel->getCookie() !== null){

			delete_cookie('user');

		}

		if ($this->CookieModel->getIdCookie() !== null){

			delete_cookie('id_user');

		}
		
		redirect(site_url());
	}

	/**
	* Metode untuk register
	* URL : http://localhost/freepik/register
	*/
	public function register()
	{
		$cookie = $this->CookieModel->getCookie();

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

					if ($this->UserModel->getUserData($username) == null){

						if ($this->UserModel->getUserDatabyEmail($email) == null){

							$this->UserModel->insertData($email, $username, $password);
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

			$user_data = $this->UserModel->getUserData($cookie);

			if ($user_data->id_role == 1){
				/*
				* Jika user adalah user biasa
				*/

				redirect(site_url());

			}else {
				/*
				* Jika user adalah user admin
				*/

				redirect(site_url('admin'));

			}

		}
		
	}
}
