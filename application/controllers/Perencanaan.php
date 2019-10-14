<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perencanaan extends CI_Controller {

	public function index($id)
	{
		$query = $this->db->query('SELECT * FROM lap_perencanaan WHERE id_paket='."'".$id."'");

		$data['informasi']=array(
			'id'=>$id,
		);
		$data['tabel']=$query->result();
		$this->load->view('admin/perencanaan',$data);
	}

	public function tambah($id_perencanaan,$id_paket,$tahun,$tukang,$pekerja)
	{
		$data= array(
			'id_lap_perencanaan'=>$id_perencanaan,
			'id_paket'=>$id_paket,
			'tahun'=>$tahun,
			'tukang'=>$tukang,
			'pekerja'=>$pekerja
		);

		$result=$this->db->insert('lap_perencanaan',$data);
		if($result)
		{
			echo "success";
		}
		else
		{
			echo 'failed';
		}

	}


}
