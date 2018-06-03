<?php

	/**
	* Model class untuk manajemen data user pada database
	*/
	class UserModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();

			
		}

		/**
		* Metode untuk mendapatkan data user berdasarkan username user
		*/
		public function getUserData($xusername){

			$query = $this->db->query("SELECT * FROM t_user WHERE username = '".$xusername."' LIMIT 1;");

			return $query->row();

		}

		/**
		* Metode untuk mendapatkan data user berdasarkan email user
		*/
		public function getUserDatabyEmail($xemail){

			$query = $this->db->query("SELECT * FROM t_user WHERE email = '".$xemail."' LIMIT 1;");

			return $query->row();

		}

		/**
		* Metode untuk mendapatkan data user berdasarkan id user
		*/
		public function getUserDatabyId($xid){

			$query = $this->db->query("SELECT * FROM t_user WHERE id = '".$xid."' LIMIT 1;");

			return $query->row();

		}

		/**
		* Metode untuk mendapatkan seluruh data user kecuali data admin
		*/
		public function getAllUserData(){

			$query = $this->db->query("SELECT id, email, username FROM t_user WHERE id_role = 1;");

			return $query->result_array();

		}

		/**
		* Metode untuk memasukkan data user ke dalam data user dan user profile dalam database
		*/
		public function insertData($xemail, $xusername, $xpassword){

			$query = $this->db->query("INSERT INTO t_user VALUES (null, 1, '".$xemail."', '".$xusername."', '".$xpassword."');");

			$user_data = $this->getUserData($xusername);

			$query = $this->db->query("INSERT INTO t_user_profile VALUES (null, ".$user_data->id.", null, null, null);");

		}

		/**
		* Metode untuk menghapus data user dari database
		*/
		public function deleteData($xid){

			$query = $this->db->query("SELECT id_gambar FROM t_gambar WHERE id_user = ".$xid.";")->result();

			foreach ($query as $value) {

				$query2 = $this->db->query("DELETE FROM t_comment WHERE id_gambar = ".$value->id_gambar.";");

				$query2 = $this->db->query("DELETE FROM t_comment WHERE id_user = ".$xid.";");
				
			}

			$query = $this->db->query("DELETE FROM t_gambar WHERE id_user = ".$xid.";");

			$query = $this->db->query("DELETE FROM t_user_profile WHERE id_user = ".$xid.";");

			$query = $this->db->query("DELETE FROM t_user WHERE id = ".$xid.";");

		}
	}

?>