<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_models extends CI_Model{

	function get_satuan(){
		$query = $this->db->get('satuan');
		return $query;
	}


}
