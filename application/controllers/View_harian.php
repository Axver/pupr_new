<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_harian extends CI_Controller {

	public function index($id)
	{
		$data=$this->db->get_where("lap_harian_mingguan",array("id_lap_harian_mingguan"=>$id))->result();
		$data['lapar']=array(
		"lapar"=>$data,
		);

		$this->load->view("user/view_harian",$data);
	}

	public function get_paket()
	{
      $id_paket=$this->input->post("id_paket");
      $getPaket=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();

      echo json_encode($getPaket);
	}

	public function data_tabel()
	{
		$id_harian=$this->input->post("id_harian");
		$this->db->select('*');
		$this->db->from('detail_bahan_alat_harian');
		$this->db->join('jenis_bahan_alat', 'jenis_bahan_alat.id_jenis_bahan_alat = detail_bahan_alat_harian.id_jenis_bahan_alat');
		$this->db->join('jenis_pekerjaan', 'jenis_pekerjaan.id = detail_bahan_alat_harian.jenis_pekerja');
		$this->db->join('satuan', 'satuan.id_satuan = detail_bahan_alat_harian.id_satuan');
		$this->db->where('detail_bahan_alat_harian.id_lap_harian_mingguan', $id_harian);
//		$selectData=$this->db->get_where("detail_bahan_alat_harian",array("id_lap_harian_mingguan"=>$id_harian))->result();
        $selectData=$this->db->get()->result();
		echo json_encode($selectData);
	}


	public function get_gambar()
	{
		$id_lap=$this->input->post("id_harian");


//		Ambil nama gambar didatabase
//
		$data=$this->db->get_where("gambar_harian",array("id_lap_harian"=>$id_lap))->result();

		echo json_encode($data);
	}

	public function edit($id,$per)
	{
		$data=$this->db->get_where("lap_harian_mingguan",array("id_lap_harian_mingguan"=>$id,"id_lap_perencanaan"=>$per))->result();
		$data['lapar']=array(
			"lapar"=>$data,
		);

		$this->load->view("user/view_harian_edit",$data);
	}


}
