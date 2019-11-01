<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/dashboard');
	}

	public function hitung()
	{

		$count_perencanaan=$this->db->query("SELECT COUNT(nip)  as perencanaan FROM lap_perencanaan ")->result();
		$count_pengawasan=$this->db->query("SELECT COUNT(nip) as pengawasan FROM lap_pengawasan ")->result();
		$count_harian=$this->db->query("SELECT COUNT(nip) as harian FROM lap_harian_mingguan ")->result();
		$count_paket=$this->db->query("SELECT COUNT(nip) as paket FROM detail_paket ")->result();
		$data=array(
			"perencanaan"=>$count_perencanaan,
			"pengawasan"=>$count_pengawasan,
			"harian"=>$count_harian,
			"paket"=>$count_paket
		);

		echo json_encode($data);
	}
}
