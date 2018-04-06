<?php

	/**
	* 
	*/
	class UserAccountModel extends CI_Model {
		
		public function __construct(){

			parent::__construct();
			
		}

		public function login($xusername, $xpassword){

			$query = $this->db->query("SELECT * FROM t_user_account WHERE username = '".$xusername."' LIMIT 1;");

			$row = $query->row();

			if ($row != null){

				if ($row->password == $xpassword){

					return "VALID";

				}else{

					return "Password tidak benar";

				}

			} else {

				return "Username tidak ditemukan";

			}

		}

		public function getUserData($xusername){

			$query = $this->db->query("SELECT * FROM t_user_account WHERE username = '".$xusername."' LIMIT 1;");

			return $query->row();

		}

		public function setCookie($xusername){

       		set_cookie('user', $xusername, 60 * 60 * 24);

		}

		public function getCookie(){

       		$cookie = get_cookie('user', TRUE);

       		if ($cookie != NULL){

       			return $cookie;

       		}else {

       			return null;

       		}

		}

	}

?>