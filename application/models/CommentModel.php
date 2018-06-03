<?php

	/**
	* Model class untuk memasukkan dan mendapatkan gambar dari database 
	*/
	class CommentModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		/**
		* Metode untuk memasukkan komentar ke dalam database
		*/
		public function insertCommentToDB($data_comment){

			$this->db->insert('t_comment', $data_comment);

		}

		/**
		* Metode untuk mendapatkan komentar berdasarkan id gambar (didapat dari gambar yang diklik di beranda)
		*/
		public function getCommentByIdGambar($id_gambar) {

			$query = $this->db->query("SELECT t_comment.id_comment, t_comment.comment, t_user.username FROM t_comment, t_user WHERE t_comment.id_gambar = " . $id_gambar . " AND t_comment.id_user = t_user.id;");

			return $query->result();

		}

	}

?>