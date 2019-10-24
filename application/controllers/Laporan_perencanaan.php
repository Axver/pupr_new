<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_perencanaan extends CI_Controller {

	public function index()
	{
		$query=$this->db->get("jenis_pekerjaan")->result();
		$query1=$this->db->get("jenis_bahan_alat")->result();
		$data['pekerjaan']=$query;
		$data['alat']=$query1;
		$this->load->view('laporan/laporan_perencanaan',$data);
	}
}
