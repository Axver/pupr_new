<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function index()
	{

	}

	public function edit_perencanaan()
	{
		$id=$this->input->post("id_lap_perencanaan");
//		$id=3;
		$this->db->select('*');
		$this->db->from('detail_jenis_pekerjaan');
		$this->db->join('jenis_pekerjaan', 'detail_jenis_pekerjaan.id = jenis_pekerjaan.id');
		$this->db->where('id_lap_perencanaan', $id);

		$data = $this->db->get()->result();
//		$data=$this->db->get_where('detail_jenis_pekerjaan', array('id_lap_perencanaan' => $id))->result();
		echo json_encode($data);
	}
}
