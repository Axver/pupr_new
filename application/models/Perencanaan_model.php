<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perencanaan_model extends CI_Model{

	function get_perencanaan(){
		$query = $this->db->get('paket');
		return $query;
	}


}
