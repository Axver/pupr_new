<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengawasan extends CI_Controller {

	public function index()
	{
		$data['user']=$this->db->get("account")->result();
		$this->load->view("pengawasan/index",$data);
	}

	public function read($id)
	{

		$query = $this->db->query("SELECT count(id_paket) as ip FROM detail_paket WHERE nip='$id'")->result();

		$data['jumlah']= array(
		   'jumlah'=>$query
		);
      $this->load->view("pengawasan/read",$data);
	}

	public function hitung()
	{
		$id_user=$this->input->post("id");
		$count_perencanaan=$this->db->query("SELECT COUNT(nip)  as perencanaan FROM lap_perencanaan WHERE nip='$id_user'")->result();
		$count_pengawasan=$this->db->query("SELECT COUNT(nip) as pengawasan FROM lap_pengawasan WHERE nip='$id_user'")->result();
		$count_harian=$this->db->query("SELECT COUNT(nip) as harian FROM lap_harian_mingguan WHERE nip='$id_user'")->result();
		$count_paket=$this->db->query("SELECT COUNT(nip) as paket FROM detail_paket WHERE nip='$id_user'")->result();
		$data=array(
		"perencanaan"=>$count_perencanaan,
		"pengawasan"=>$count_pengawasan,
		"harian"=>$count_harian,
			"paket"=>$count_paket
		);

		echo json_encode($data);
	}
}
