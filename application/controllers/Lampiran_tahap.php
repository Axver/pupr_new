<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lampiran_tahap extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}


	public function index()
	{
		$this->load->view("user/lampiran_tahap");
	}


	public function perencanaan()
	{
		$id_paket = $this->input->post("id_paket");

		$data = $this->db->get_where("lap_perencanaan", array("id_paket" => $id_paket))->result();


		echo json_encode($data);
	}


	public function validasi()
	{

		$bulan_mulai = $this->input->post("bulan_mulai");
		$bulan_selesai = $this->input->post("bulan_selesai");
		$id_paket = $this->input->post("id_paket");
		$lap_perencanaan = $this->input->post("laporan_perencanaan");


		// Select semua jenis pekerjaan yang sesuai dengan data atas
		// select dari detail bahan alat harian


		// $data=$this->db->query("SELECT * FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerja=jenis_pekerjaan.id INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE  MONTH(id_lap_harian_mingguan) >= $bulan_mulai AND MONTH(id_lap_harian_mingguan) <= $bulan_selesai AND id_lap_perencanaan='$lap_perencanaan' GROUP BY id_jenis_bahan_alat");


		// echo "SELECT * FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerjaan=jenis_pekerjaan.id INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE  MONTH(id_lap_harian_mingguan) >= $bulan_mulai AND MONTH(id_lap_harian_mingguan) <= $bulan_selesai AND id_lap_perencanaan='$lap_perencanaan' GROUP BY id_jenis_bahan_alat";


		$data = $this->db->query("SELECT *,SUM(total) as sum FROM detail_bahan_alat_harian
        INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerjaan=jenis_pekerjaan.id
        WHERE id_lap_perencanaan='$lap_perencanaan' 
        AND id_paket='$id_paket'
       
        AND  MONTH(id_lap_harian_mingguan)>='$bulan_mulai' AND  MONTH(id_lap_harian_mingguan)<='$bulan_selesai' GROUP BY jenis_pekerjaan
        ")->result();

		echo json_encode($data);
	}



	public function cetak()
	{

		$this->load->view("user/cetak_lampiran_tahap");
	}


	public function cetak_asli($awal, $akhir, $perencanaan)
	{
		$this->load->view("user/cetak_asli");
	}



	public function edit_asli()
	{
		$this->load->view("user/edit_asli");
	}



	public function hapus()
	{
		$bulan_awal = $this->input->post("bulan_awal");
		$bulan_akhir = $this->input->post("bulan_akhir");
		$perencanaan = $this->input->post("perencanaan");
		$jenis_pekerjaan = $this->input->post("jenis_pekerjaan");



		// Query untuk menghapus disini

		// Pertama select terlebih dahulu
		$data = $this->db->query("SELECT * FROM lampiran_tahap WHERE id_lap_perencanaan='$perencanaan' AND bulan_awal='$bulan_awal' AND bulan_akhir='$bulan_akhir' AND jenis_pekerjaan='$jenis_pekerjaan'")->result();

		$count = count($data);

		$i = 0;

		$gambar1 = "x";
		$gambar1 = "y";
		$gambar1 = "z";


		while ($i < $count) {
			$gambar1 = $data[$i]->gambar_0;
			$gambar2 = $data[$i]->gambar_50;
			$gambar3 = $data[$i]->gambar_100;

			$i++;
		}

		// Hapus dari db

		$this->db->query("DELETE FROM lampiran_tahap WHERE id_lap_perencanaan='$perencanaan' AND bulan_awal='$bulan_awal' AND bulan_akhir='$bulan_akhir' AND jenis_pekerjaan='$jenis_pekerjaan'");

		// Hapus file dari folder

		$target1 = "gambar/" . $gambar1;
		$target2 = "gambar/" . $gambar2;
		$target3 = "gambar/" . $gambar3;

		// Unlink

		unlink($target1);
		unlink($target2);
		unlink($target3);
	}
}
