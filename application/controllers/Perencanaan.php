<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perencanaan extends CI_Controller {

	public function index($id)
	{
		$query = $this->db->query('SELECT id_lap_perencanaan,lap_perencanaan.id_paket as id_paket,tukang,pekerja,paket.nama as nama_paket,paket.tahun as tahun FROM lap_perencanaan INNER JOIN paket ON lap_perencanaan.id_paket=paket.id_paket WHERE lap_perencanaan.id_paket='."'".$id."'");

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
