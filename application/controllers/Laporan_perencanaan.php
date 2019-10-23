<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_perencanaan extends CI_Controller {

	public function index()
	{
		$query=$this->db->get("jenis_pekerjaan")->result();
		$data['pekerjaan']=$query;
		$this->load->view('laporan/laporan_perencanaan',$data);
	}
}
