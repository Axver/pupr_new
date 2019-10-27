<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function index()
	{

	}

	public function edit_perencanaan()
	{
		$id=$this->input->post("id_lap_perencanaan");
		$data=$this->db->get_where('detail_jenis_pekerjaan', array('id_lap_perencanaan' => $id))->result();
		echo json_encode($data);
	}
}
