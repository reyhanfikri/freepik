<?php

	/**
	* Model class untuk manajemen gambar
	*/
	class ModelGambar extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		public function insertFileGambar($data) {

			/*$this->db->insert('t_upload_gambar', $data);*/

		}

		public function getAllGambar() {

			$q = $this->db->select('*')->from('t_gambar')->get();

			return $q->result();

		}

		public function getGambarbyNamaFile($nama_file) {

			$q = $this->db->select('*')->from('t_gambar')->where('nama_file', $nama_file)->limit(1)->get();

			return $q->row();

		}

	}

?>