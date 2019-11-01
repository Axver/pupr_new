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

	public function cetak($lap,$per)
	{
       $this->load->view("laporan/view_laporan_harian");
	}

	public function data()
	{
		$id_lap_harian=$this->input->post("id_lap_harian");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");

		$select_data=$this->db->query("SELECT * FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan='$id_lap_harian' AND id_lap_perencanaan='$id_lap_perencanaan'")->result();


		echo json_encode($select_data);
	}


}
