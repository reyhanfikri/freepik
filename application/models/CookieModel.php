<?php

	/**
	* Model class untuk mengeset dan mendapatkan cookie id user dan username user
	*/
	class CookieModel extends CI_Model {
		
		/**
		* Metode konstruktor
		*/
		public function __construct(){

			parent::__construct();
			
		}

		/**
		* Metode untuk mengeset cookie
		*/
		public function setCookie($xusername, $xid){

       		set_cookie('user', $xusername, 60 * 60 * 24);
       		set_cookie('id_user', $xid, 60 * 60 * 24);

		}

		/**
		* Metode untuk mendapatkan cookie yang berisi username user
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
		* Metode untuk mendapatkan cookie yang berisi id user
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