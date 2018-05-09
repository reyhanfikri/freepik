<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk laman gallery online
*/
class Home extends CI_Controller {

	/**
	* Metode konstruktor
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->model(array('UserModel', 'CookieModel', 'ModelGambar', 'CommentModel'));
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
	* Metode untuk laman hasil gambar
	* URL : http://localhost/freepik/highlight
	*/
	public function highlight($nama_file)
	{

		$data['highlight'] = $this->ModelGambar->getGambarbyNamaFile($nama_file);
		$this->ModelGambar->iterateJumlahView($data['highlight']->id_gambar, 
		$data['highlight']->jumlah_view);

		$data['user'] = $this->UserModel->getUserDatabyId($data['highlight']->id_user);

		if ($this->input->post('submitcomment') !== null) {

			$data_comment['id_gambar'] = $data['highlight']->id_gambar;
			$data_comment['id_user'] = $this->CookieModel->getIdCookie();
			$data_comment['comment'] = $this->input->post('komentar');

			$this->CommentModel->insertCommentToDB($data_comment);

		}

		$this->load->view('v_highlight', $data);

	}

	/**
	* Metode untuk menampilkan gambar di beranda
	*/
	public function loadAllGambar() {

		$data['semua_gambar'] = $this->ModelGambar->getAllGambar();

		return $data;

	}

	/**
	* Metode untuk laman profil
	*/
	public function profil() {

		$this->load->view('v_profile');

	}
}
