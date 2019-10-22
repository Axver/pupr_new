<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{


	public function index()
	{
		$data = $this->db->get('jenis_pekerjaan')->result();

		echo json_encode($data);

	}

	public function data_pekerjaan()
	{
		$data=$this->db->get("detail_jenis_pekerjaan")->result();
		echo json_encode($data);
	}

	public function add_detail_pekerjaan()
	{
      $data=$this->input->post();
      $id_paket=$data['id_paket'];
      $id=$data['id'];
      $id_pekerjaan=$data['id_pekerjaan'];
      $tahun=$data['tahun'];
      $tukang=$data['tukang'];
      $pekerja=$data['pekerja'];

      $list_data= array(
      	'id'=>$id,
		  'id_paket'=>$id_paket,
		  "tahun"=>$tahun,
		  "tukang"=>$tukang,
		  "pekerja"=>$pekerja,
		  "id_lap_perencanaan"=>$id_pekerjaan
	  );

      $insert=$this->db->insert("detail_jenis_pekerjaan",$list_data);
      if($insert)
	  {
	  	echo "Success";
	  }
      else
	  {
	  	echo "Failed";
	  }
//		var_dump($list_data);
//		print_r($list_data);
//		print_r($_POST);
	}


}
