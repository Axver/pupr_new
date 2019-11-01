<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mingguan extends CI_Controller {

	public function index($id)
	{
		$harian=$this->db->get("lap_harian_mingguan")->result();
		$data['harian']= array(
			'harian'=>$harian
		);
		$this->load->view("admin/harian_/list",$data);
	}

	public function cetak($lap,$per)
	{
       $this->load->view("laporan/view_laporan_harian");
	}

	public function data()
	{
		$id_lap_harian=$this->input->post("id_lap_harian");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");

		$select_data=$this->db->query("SELECT * FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan='$id_lap_harian' AND id_lap_perencanaan='$id_lap_perencanaan'")->result();


		echo json_encode($select_data);
	}

	public function paket()
	{
		$id=$this->input->post("id_perencanaan");
		$this->db->select('*');
		$this->db->from('lap_perencanaan');
		$this->db->join('paket', 'lap_perencanaan.id_paket = paket.id_paket');
		$this->db->join('detail_paket', 'paket.id_paket = detail_paket.id_paket');
		$this->db->where('lap_perencanaan.id_lap_perencanaan',$id);
		$query = $this->db->get()->result();

		echo json_encode($query);



	}

	public function minggu()
	{
		$this->load->view("admin/harian_/report_minggu");
	}

	public function bulan()
	{

	}

	public function jenis_pekerjaan()
    {

	$select_jenis=$this->db->query("SELECT * FROM detail_jenis_pekerjaan INNER JOIN jenis_pekerjaan ON detail_jenis_pekerjaan.id=jenis_pekerjaan.id")->result();

	echo json_encode($select_jenis);
    }


    public function all_harian()
	{
		$select_data=$this->db->get("lap_harian_mingguan")->result();
		echo json_encode($select_data);
	}

	public function count()
	{
		$between=$this->input->post("id");
//		Select Count Disini
		$data=$this->db->query("SELECT COUNT(id_lap_harian_mingguan) as jumlah FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan='$between'")->result();

		echo json_encode($data);
	}


}
