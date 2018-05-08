<?php

	/**
	* Model class untuk manajemen cookie
	*/
	class CookieModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		/**
		* Metode untuk mengeset cookie pada saat user login
		* Menerima input berupa string username
		* Tidak mengeluarkan output
		*/
		public function setCookie($xusername, $xid){

       		set_cookie('user', $xusername, 60 * 60 * 24);
       		set_cookie('id_user', $xid, 60 * 60 * 24);

		}

		/**
		* Metode untuk mendapatkan cookie nama user pada user saat login
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
		* Metode untuk mendapatkan cookie id user pada user saat login
		* Tidak menerima input
		* Mengeluarkan output berupa string atau null
		*/
		public function getIdCookie(){

       		$cookie = get_cookie('id_user', TRUE);

       		if ($cookie != NULL){

       			return $cookie;

       		}else {

       			return null;

       		}

		}

	}

?>