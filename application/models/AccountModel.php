<?php

	/**
	* Model class untuk manajemen login
	*/
	class AccountModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		/**
		* Metode untuk proses login (Untuk user dan admin)
		* Menerima input berupa string username dan string password
		* Mengeluarkan output berupa string kalimat
		*/
		public function login($xusername, $xpassword){

			$query = $this->db->query("SELECT * FROM t_user WHERE username = '".$xusername."' LIMIT 1;");

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

	}

?>