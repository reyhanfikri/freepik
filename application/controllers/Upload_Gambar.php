<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk laman upload gambar
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

		$upload_message['upload_success_or_failed'] = "";

		if ($this->input->post('submit') !== null) {

			$config['upload_path'] = "./upload/";
			$config['allowed_types'] = "jpg|png";
			$config['max_size'] = 10240;
			$config['max_width'] = 20480;
			$config['max_height'] = 20480;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('userfile')) {

				$data['id_user'] = $this->CookieModel->getIdCookie();
				$data['id_ekstensi_gambar'] = 1;

				if ($this->upload->data('file_ext') == ".jpg") {

					$data['id_ekstensi_gambar'] = 1;
		
				} else if ($this->upload->data('file_ext') == ".png") {

					$data['id_ekstensi_gambar'] = 2;

				}

				$data['nama_gambar'] = $this->upload->data('raw_name');
				$data['nama_file'] = $this->upload->data('file_name');
				$data['jumlah_like'] = 0;
				$data['jumlah_view'] = 0;

				$this->ModelGambar->insertFileGambar($data);

				$upload_message['upload_success_or_failed'] = "Upload sukses!";

				$this->load->view('v_header');
				$this->load->view('v_upload', $upload_message);

			} else {

				$upload_message['upload_success_or_failed'] = "Upload gagal!";
				$this->load->view('v_header');
				$this->load->view('v_upload', $upload_message);

			}

		} else {

			$this->load->view('v_header');
			$this->load->view('v_upload', $upload_message);

		}

	}

}
