<?php

	/**
	* Model class untuk manajemen data gambar pada database dan mendapatkan gambar dari database
	*/
	class ModelGambar extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		/**
		* Metode untuk memasukkan data gambar yang diupload user
		*/
		public function insertFileGambar($data) {

			$this->db->insert('t_gambar', $data);

		}

		/**
		* Metode untuk mendapatkan semua data gambar
		*/
		public function getAllGambar() {

			$q = $this->db->select('*')->from('t_gambar')->get();

			return $q->result();

		}

		/**
		* Metode untuk mendapatkan data gambar berdasarkan kata kunci yang diketik user
		*/
		public function getGambarBySearch($search) {

			$q = $this->db->query("SELECT * FROM t_gambar WHERE nama_gambar LIKE '%".$search."%'");

			return $q->result();

		}

		/**
		* Metode untuk mendapatkan data gambar berdasarkan nama filenya 
		*/
		public function getGambarbyNamaFile($nama_file) {

			$q = $this->db->select('*')->from('t_gambar')->where('nama_file', $nama_file)->limit(1)->get();

			return $q->row();

		}

		/**
		* Metode untuk mengupdate jumlah view suatu gambar pada database
		*/
		public function iterateJumlahView($id, $jumlah_view) {

			$jumlah_view++;

			$q = $this->db->set('jumlah_view', $jumlah_view)->where('id_gambar', $id)->update('t_gambar');

		}

		/**
		* Metode untuk mengupdate jumlah like suatu gambar pada database
		*/
		public function iterateJumlahLike($id, $jumlah_like) {

			$jumlah_like++;

			$q = $this->db->set('jumlah_like', $jumlah_like)->where('id_gambar', $id)->update('t_gambar');

		}

	}

?>