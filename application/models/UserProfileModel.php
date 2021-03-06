<?php

	/**
	* Model class untuk manajemen user profil pada database
	*/
	class UserProfileModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		/**
		* Metode untuk mendapatkan data user profile berdasarkan id user
		*/
		public function getUserProfileData($id_user) {

			$query = $this->db->query("SELECT * FROM t_user_profile WHERE id_user = '".$id_user."' LIMIT 1;");

			return $query->row();

		}

		/**
		* Metode untuk mengupdate data user profile
		*/
		public function updateUserProfileData($id_user_profile, $nama_lengkap, $jenis_kelamin, $alamat) {

			$query = $this->db->set('nama_lengkap', $nama_lengkap)->where('id_user_profile', $id_user_profile)->update('t_user_profile');

			$query = $this->db->set('jenis_kelamin', $jenis_kelamin)->where('id_user_profile', $id_user_profile)->update('t_user_profile');

			$query = $this->db->set('alamat', $alamat)->where('id_user_profile', $id_user_profile)->update('t_user_profile');

		}
		
	}

?>