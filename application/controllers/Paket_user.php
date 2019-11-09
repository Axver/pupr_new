<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_user extends CI_Controller {

	public function index()
	{
		$query=$this->db->get("account")->result();
		$query_paket=$this->db->get("paket")->result();
		$data['user']= array(
		'user'=>$query,
			'paket'=>$query_paket
		);


		$this->load->view('admin/paket_user',$data);
	}

	public function check_id()
	{
		$id=$this->input->post("id");
		$tahun=$this->input->post("tahun");

		$query = $this->db->get_where('detail_paket', array('id_paket' => $id,'tahun' => $tahun))->result();

		$count=count($query);
		echo $count;
	}


	public function tambah_paket()
	{
		$id=$this->input->post("id");
		$tahun=$this->input->post("tahun");
		$nip=$this->input->post("nip");

		$data= array(
            "id_paket"=>$id,
			"tahun"=>$tahun,
			"nip"=>$nip
		);

		$this->db->insert("detail_paket",$data);

		echo "Success";


	}



}
