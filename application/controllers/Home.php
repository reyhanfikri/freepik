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

				$data['semua_gambar'] = $this->loadAllGambar();

				$this->load->view('v_home', $data);

			}

		}else {

			$data['semua_gambar'] = $this->loadAllGambar();

			$this->load->view('v_home', $data);

		}
	}

	/**
	* Metode untuk mencari gambar dengan user interface yang sama dengan beranda
	* URL : http://localhost/freepik/cari_gambar
	*/
	public function cari_gambar()
	{
		if ($this->input->get('search') !== null) {
			
				$data['semua_gambar'] = $this->searchGambar($this->input->get('search'));

				$this->load->view('v_home', $data);

		} else {

			redirect(site_url());

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

		$data['semua_komentar'] = $this->CommentModel->getCommentByIdGambar($data['highlight']->id_gambar);

		if ($this->input->post('submitcomment') !== null) {

			$data_comment['id_gambar'] = $data['highlight']->id_gambar;
			$data_comment['id_user'] = $this->CookieModel->getIdCookie();
			$data_comment['comment'] = $this->input->post('komentar');

			if ($data_comment['id_user'] !== null) {

				if ($data_comment['comment'] != "") {

					$this->CommentModel->insertCommentToDB($data_comment);

				}

			} else {

				redirect(site_url('login'));

			}

		}

		$this->load->view('v_highlight', $data);

	}

	/**
	* Metode untuk menampilkan gambar di beranda
	*/
	public function loadAllGambar() {

		$data_gambar = $this->ModelGambar->getAllGambar();

		return $data_gambar;

	}

	/**
	* Metode untuk menampilkan gambar dengan kata kunci yang diketik
	*/
	public function searchGambar($search) {

		$data_gambar = $this->ModelGambar->getGambarBySearch($search);

		return $data_gambar;

	}

	/**
	* Metode untuk laman profil
	*/
	public function profil() {

		$this->load->view('v_profile');

	}
}
