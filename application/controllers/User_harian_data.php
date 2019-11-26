<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_harian_data extends CI_Controller {

	public function index()
	{
		$nip=$this->session->userdata("nip");

		$sql=$this->db->query("SELECT id_lap_harian_mingguan,lap_harian_mingguan.id_lap_perencanaan,lap_perencanaan.keterangan as keterangan,paket.nama as paket_nama FROM lap_harian_mingguan INNER JOIN lap_perencanaan ON lap_harian_mingguan.id_lap_perencanaan=lap_perencanaan.id_lap_perencanaan INNER JOIN paket ON lap_perencanaan.id_paket=paket.id_paket INNER JOIN detail_paket ON paket.id_paket=detail_paket.id_paket WHERE detail_paket.nip=$nip")->result();


		$data['harian']=array(
			"harian"=>$sql,
		);
				$this->load->view('user/harian_data',$data);
	}


}
