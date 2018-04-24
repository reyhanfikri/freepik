<?php

	/**
	* Model class untuk manajemen user
	*/
	class UserModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		/**
		* Metode untuk mendapatkan data user pada table t_user berdasarkan username user
		* Menerima input berupa string username
		* Mengeluarkan output berupa objek
		*/
		public function getUserData($xusername){

			$query = $this->db->query("SELECT * FROM t_user WHERE username = '".$xusername."' LIMIT 1;");

			return $query->row();

		}

		/**
		* Metode untuk mendapatkan data user pada table t_user berdasarkan email user
		* Menerima input berupa string email
		* Mengeluarkan output berupa objek
		*/
		public function getUserDatabyEmail($xemail){

			$query = $this->db->query("SELECT * FROM t_user WHERE email = '".$xemail."' LIMIT 1;");

			return $query->row();

		}

		/**
		* Metode untuk mendapatkan seluruh data user pada table t_user kecuali data admin
		* Tidak menerima input
		* Mengeluarkan output berupa array
		*/
		public function getAllUserData(){

			$query = $this->db->query("SELECT id, email, username FROM t_user WHERE id_role = 1;");

			return $query->result_array();

		}

		/**
		* Metode untuk memasukkan data register ke dalam database (Dimasukkan ke table t_user dan t_user_profil)
		* Menerima input berupa string email, string username, dan string password
		* Tidak mengeluarkan output
		*/
		public function insertData($xemail, $xusername, $xpassword){

			$query = $this->db->query("INSERT INTO t_user VALUES (null, 1, '".$xemail."', '".$xusername."', '".$xpassword."');");

			$user_data = $this->getUserData($xusername);

			$query = $this->db->query("INSERT INTO t_user_profile VALUES (null, ".$user_data->id.", null, null, null);");

		}

		/**
		* Metode untuk menghapus data user pada tabel t_user dan t_user_profil
		* Menerima input berupa integer id
		* Tidak mengeluarkan output
		*/
		public function deleteData($xid){

			$query = $this->db->query("DELETE FROM t_user_profile WHERE id_user = ".$xid.";");

			$query = $this->db->query("DELETE FROM t_user WHERE id = ".$xid.";");

		}
	}

?>