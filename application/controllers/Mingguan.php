<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mingguan extends CI_Controller {

	public function index($id)
	{
		$harian=$this->db->get("lap_harian_mingguan")->result();
		$data['harian']= array(
			'harian'=>$harian
		);
		$this->load->view("admin/harian_/list",$data);
	}


}
