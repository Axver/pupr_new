<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_harian extends CI_Controller {

	public function index()
	{
		$paket=$this->db->get("paket")->result();
		$data['paket']=$paket;
		$this->load->view('laporan/laporan_harian',$data);
	}

	public function perencanaan()
	{
     $id=$this->input->post("id");
     $select_perencanaan=$this->db->get_where("lap_perencanaan", array('id_paket' => $id))->result();

     echo json_encode($select_perencanaan);
	}

	public function jenis_alat()
	{
		$jenis=$this->db->get("jenis_bahan_alat")->result();
		echo json_encode($jenis);
	}

	public function jenis_satuan()
	{
       $satuan=$this->db->get("satuan")->result();
       echo json_encode($satuan);
	}

	public function perencanaan_date()
	{
		$id_lap=$this->input->post("id");
        $getdate=$this->db->get_where("lap_perencanaan",array('id_lap_perencanaan',$id_lap))->result();

        echo json_encode($getdate);
	}
}
