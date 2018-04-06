<?php

	/**
	* 
	*/
	class UserAccountModel extends CI_Model {
		
		public function __construct(){

			parent::__construct();
			
		}

		public function loginDataValidation($xusername, $xpassword){

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

		public function login($xusername){

			$query = $this->db->query("SELECT * FROM t_user_account WHERE username = '".$xusername."' LIMIT 1;");

			return $query->result_array();

		}

	}

?>