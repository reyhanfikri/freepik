<?php

	/**
	* Model class untuk manajemen login
	*/
	class CommentModel extends CI_Model {
		
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
		public function insertCommentToDB($data_comment){

			$this->db->insert('t_comment', $data_comment);

		}

	}

?>