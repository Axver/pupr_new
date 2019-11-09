<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{

		$this->load->view('user/dashboard');
	}





	public function lihat_paket($data)
	{
		$this->load->view('user/lihat_paket');
	}

	public function perencanaan($data)
	{
		$sel_paket=$this->db->get("paket")->result();
		$query=$this->db->get("jenis_pekerjaan")->result();
		$query1=$this->db->get("jenis_bahan_alat")->result();
		$data1['pekerjaan']=$query;
		$data1['alat']=$query1;
		$data1['paket']=$sel_paket;
		$this->load->view('user/perencanaan',$data1);
	}

	public function detail_paket()
	{
		$id_paket=$this->input->post("id_paket");

		$query=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
		echo json_encode($query);
	}





}
