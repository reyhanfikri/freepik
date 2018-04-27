<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk laman home
*/
class Upload_Gambar extends CI_Controller {

	/**
	* Metode konstruktor
	*/
	public function __construct() {

		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->model(array('ModelGambar', 'CookieModel'));

	}

	/**
	* Metode default
	* URL : http://localhost/freepik/upload_gambar
	*/
	public function index() {

		$this->load->view('v_upload');

	}

	/**
	* Metode untuk proses upload gambar
	*/
	public function prosesUpload() {

		$config['upload_path'] = "./upload/";
		$config['allowed_types'] = "jpg|png";
		$config['max_size'] = 10240;
		$config['max_width'] = 20480;
		$config['max_height'] = 20480;

		$this->load->library('upload', $config);

		// execute
		if ($this->upload->do_upload('userfile')) {

			// Insert to DB
			/*$data['nama'] = $this->upload->data('file_name');
			$this->ModelUpload->insertToDB($data);*/

			/*$data = ['upload_data' => $this->upload->data()];*/
			redirect(site_url('upload_gambar'));

		} else {

			redirect(site_url());

		}

	}
}
