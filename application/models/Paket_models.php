<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_models extends CI_Model{

	function get_paket(){
		$query = $this->db->get('paket');
		return $query;
	}


}
