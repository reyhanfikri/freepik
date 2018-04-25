<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk laman home
*/
class Home extends CI_Controller {

	/**
	* Metode konstruktor
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->model(array('UserModel', 'CookieModel', 'ModelGambar'));
	}

	/**
	* Metode default
	* URL : http://localhost/freepik
	*/
	public function index()
	{

		$cookie = $this->CookieModel->getCookie();

		if ($cookie !== null){

			$user_data = $this->UserModel->getUserData($cookie);

			if ($user_data->id_role == 2){

				redirect(site_url('admin'));

			}else {

				$this->load->view('v_home', $this->loadAllGambar());

			}

		}else {

			$this->load->view('v_home', $this->loadAllGambar());

		}
	}

	/**
	* Metode default
	* URL : http://localhost/freepik/highlight
	*/
	public function highlight($nama_file)
	{
		$data['nama_file'] = $nama_file;
		$this->load->view('v_highlight', $data);

	}

	public function loadAllGambar() {

		$data['semua_gambar'] = $this->ModelGambar->getAllGambar();

		return $data;

	}
}
