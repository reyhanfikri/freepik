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
		* Metode untuk 
		* Menerima input berupa 
		* Mengeluarkan output berupa
		*/
		public function insertCommentToDB($data_comment){

			$this->db->insert('t_comment', $data_comment);

		}

		public function getCommentByIdGambar($id_gambar) {

			$query = $this->db->query("SELECT t_comment.id_comment, t_comment.comment, t_user.username FROM t_comment, t_user WHERE t_comment.id_gambar = " . $id_gambar . " AND t_comment.id_user = t_user.id;");

			return $query->result();

		}

	}

?>