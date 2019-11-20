<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catur_wulan extends CI_Controller {

	public function index()
	{

		$this->load->view("user/generate_catur");
	}


	public function perencanaan()
	{
		$id_paket=$this->input->post("id_paket");
		$id_get=$this->db->get_where("lap_perencanaan",array("id_paket"=>$id_paket))->result();

		echo json_encode($id_get);
	}

	public function data()
	{
		$tahun=$this->input->post("tahun");
		$bulan=$this->input->post("bulan");
		$id_perencanaan=$this->input->post("id_perencanaan");
		$batas=$this->input->post("batas");

//	Select Disini
		$data=$this->db->query("SELECT *,COUNT(jumlah_pekerja) as count FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerja=jenis_pekerjaan.id INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) >= $bulan AND MONTH(id_lap_harian_mingguan) <= $batas AND id_lap_perencanaan='$id_perencanaan' GROUP BY jenis_pekerja");
		$data=$data->result();

		echo json_encode($data);
//echo "SELECT *,COUNT(jumlah_pekerja) FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY jenis_pekerja";
	}



}
