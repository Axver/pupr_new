<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mingguan_model extends CI_Model{

	function get_mingguan($clause){
		$query = $this->db->query('SELECT * FROM lap_harian_mingguan WHERE id_paket='."'".$clause."'");
		return $query;
	}


}
