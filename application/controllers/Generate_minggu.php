<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_minggu extends CI_Controller {

	public function index()
	{
      $this->load->view("user/generate_minggu");
	}

	public function laporan_perencanaan()
	{
		$id_paket=$this->input->post("id_paket");
//		Select Laporan perencanaan dengan id paket yang sama
		$hasil=$this->db->get_where("lap_perencanaan",array("id_paket"=>$id_paket))->result();

		echo json_encode($hasil);
	}


}
