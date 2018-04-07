<?php

	/**
	* Model class untuk manajemen user
	*/
	class UserAccountModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		/**
		* Metode untuk proses login
		* Menerima input berupa string username dan string password
		* Mengeluarkan output berupa string kalimat
		*/
		public function login($xusername, $xpassword){

			$query = $this->db->query("SELECT * FROM t_user_account WHERE username = '".$xusername."' LIMIT 1;");

			$row = $query->row();

			if ($row != null){

				if ($row->password == $xpassword){

					return "VALID";

				}else{

					return "Perhatian! Password tidak benar";

				}

			} else {

				return "Perhatian! Username tidak ditemukan";

			}

		}

		/**
		* Metode untuk mendapatkan data user pada table t_user_account berdasarkan username user
		* Menerima input berupa string username
		* Mengeluarkan output berupa objek
		*/
		public function getUserData($xusername){

			$query = $this->db->query("SELECT * FROM t_user_account WHERE username = '".$xusername."' LIMIT 1;");

			return $query->row();

		}

		/**
		* Metode untuk mendapatkan data user pada table t_user_account berdasarkan email user
		* Menerima input berupa string email
		* Mengeluarkan output berupa objek
		*/
		public function getUserDatabyEmail($xemail){

			$query = $this->db->query("SELECT * FROM t_user_account WHERE email = '".$xemail."' LIMIT 1;");

			return $query->row();

		}

		/**
		* Metode untuk mengeset cookie pada saat user login
		* Menerima input berupa string username
		* Tidak mengeluarkan output
		*/
		public function setCookie($xusername){

       		set_cookie('user', $xusername, 60 * 60 * 24);

		}

		/**
		* Metode untuk mendapatkan cookie pada user saat login
		* Tidak menerima input
		* Mengeluarkan output berupa string atau null
		*/
		public function getCookie(){

       		$cookie = get_cookie('user', TRUE);

       		if ($cookie != NULL){

       			return $cookie;

       		}else {

       			return null;

       		}

		}

		/**
		* Metode untuk memasukkan data register ke dalam database (Dimasukkan ke table t_user_account dan t_user_profil)
		* Menerima input berupa string email, string username, dan string password
		* Tidak mengeluarkan output
		*/
		public function insertData($xemail, $xusername, $xpassword){

			$query = $this->db->query("INSERT INTO t_user_account VALUES (null, '".$xemail."', '".$xusername."', '".$xpassword."', 'user');");

			$user_data = $this->getUserData($xusername);

			$query = $this->db->query("INSERT INTO t_user_profile VALUES (null, ".$user_data->id.", null, null, null);");

		}
	}

?>