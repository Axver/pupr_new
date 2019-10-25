<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_perencanaan extends CI_Controller {

	public function index()
	{
		$sel_paket=$this->db->get("paket")->result();
		$query=$this->db->get("jenis_pekerjaan")->result();
		$query1=$this->db->get("jenis_bahan_alat")->result();
		$data['pekerjaan']=$query;
		$data['alat']=$query1;
		$data['paket']=$sel_paket;
		$this->load->view('laporan/laporan_perencanaan',$data);
	}

	public function add_perencanaan()
	{
       $id_paket=$this->input->post('id_paket');
       $tahun=$this->input->post('tahun');

//       Getting Last Input Id

//		Input Laporan Perencanaan


	}
}
