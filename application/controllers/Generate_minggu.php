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

	public function jenis_pekerjaan()
	{
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
//		Select Distint data dari database
		$this->db->select('*');
		$this->db->distinct('id_jenis_bahan_alat');
		$this->db->from('detail_bahan_alat_harian');
		$this->db->join('jenis_pekerjaan', 'detail_bahan_alat_harian.jenis_pekerja = jenis_pekerjaan.id');

		$data=$this->db->get()->result();
		echo json_encode($data);
	}


}
