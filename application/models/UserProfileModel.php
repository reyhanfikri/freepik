<?php

	/**
	* Model class untuk manajemen profil
	*/
	class UserProfileModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		public function getUserProfileData($id_user) {

			$query = $this->db->query("SELECT * FROM t_user_profile WHERE id_user = '".$id_user."' LIMIT 1;");

			return $query->row();

		}
		
	}

?>