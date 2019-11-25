<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_minggu extends CI_Controller {

	public function index()
	{
      $this->load->view("user/generate_minggu");
	}

	public function laporan_perencanaan()
	{
		$id_paket=$this->input->post("id_paket");
//		Select Laporan perencanaan dengan id paket yang sama
		$hasil=$this->db->get_where("lap_perencanaan",array("id_paket"=>$id_paket))->result();

		echo json_encode($hasil);
	}

	public function jenis_pekerjaan()
	{
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
//		Select Distint data dari database
//		$this->db->select('*');
//		$this->db->distinct('id_jenis_bahan_alat');
//		$this->db->from('detail_bahan_alat_harian');
//		$this->db->join('jenis_pekerjaan', 'detail_bahan_alat_harian.jenis_pekerja = jenis_pekerjaan.id');

		$data=$this->db->query("SELECT *, SUM(jumlah_pekerja) 
FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerja = jenis_pekerjaan.id WHERE detail_bahan_alat_harian.id_lap_perencanaan='$id_lap_perencanaan'
GROUP BY jenis_pekerja")->result();

//		$data=$this->db->get()->result();
		echo json_encode($data);
	}

	public function jenis_alat()
	{
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
//		Select Distint data dari database
//		$this->db->select('*');
//		$this->db->distinct('id_jenis_bahan_alat');
//		$this->db->from('detail_bahan_alat_harian');
//		$this->db->join('jenis_pekerjaan', 'detail_bahan_alat_harian.jenis_pekerja = jenis_pekerjaan.id');

		$data=$this->db->query("SELECT *, SUM(jumlah_bahan) FROM detail_bahan_alat_harian INNER JOIN jenis_bahan_alat ON detail_bahan_alat_harian.id_jenis_bahan_alat = jenis_bahan_alat.id_jenis_bahan_alat INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE detail_bahan_alat_harian.id_lap_perencanaan='$id_lap_perencanaan' GROUP BY detail_bahan_alat_harian.id_jenis_bahan_alat")->result();

//		$data=$this->db->get()->result();
		echo json_encode($data);
	}

	public function jenis_alat1()
	{
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
//		Select Distint data dari database
//		$this->db->select('*');
//		$this->db->distinct('id_jenis_bahan_alat');
//		$this->db->from('detail_bahan_alat_harian');
//		$this->db->join('jenis_pekerjaan', 'detail_bahan_alat_harian.jenis_pekerja = jenis_pekerjaan.id');

		$data=$this->db->query("SELECT *, SUM(jumlah_bahan) as sum FROM detail_bahan_alat_harian INNER JOIN jenis_bahan_alat ON detail_bahan_alat_harian.id_jenis_bahan_alat = jenis_bahan_alat.id_jenis_bahan_alat INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE detail_bahan_alat_harian.id_lap_perencanaan='$id_lap_perencanaan' GROUP BY detail_bahan_alat_harian.id_jenis_bahan_alat")->result();

//		$data=$this->db->get()->result();
		echo json_encode($data);
	}

	public function between_date()
	{
		$start=$this->input->post('start');
		$end=$this->input->post("end");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");

        $start=strtotime($start);
        $end=strtotime($end);
		$start = date('Y-m-d',$start);
		$end = date('Y-m-d',$end);

//		Select Beetween
		$data=$this->db->query("SELECT * FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan>='$start' AND id_lap_harian_mingguan<='$end' AND id_lap_perencanaan='$id_lap_perencanaan'")->result();
		echo json_encode($data);
	}

	public function between_pekerja()
	{
		$start=$this->input->post('start');
		$end=$this->input->post("end");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");

		$start=strtotime($start);
		$end=strtotime($end);
		$start = date('Y-m-d',$start);
		$end = date('Y-m-d',$end);

//		Select Beetween
		$data=$this->db->query("SELECT SUM(jumlah_pekerja) as sum FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan>='$start' AND id_lap_harian_mingguan<='$end' AND id_lap_perencanaan='$id_lap_perencanaan'")->result();
		echo json_encode($data);
	}

	public function between_tukang()
	{
		$start=$this->input->post('start');
		$end=$this->input->post("end");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");

		$start=strtotime($start);
		$end=strtotime($end);
		$start = date('Y-m-d',$start);
		$end = date('Y-m-d',$end);

//		Select Beetween
		$data=$this->db->query("SELECT SUM(jumlah_tukang) as sum FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan>='$start' AND id_lap_harian_mingguan<='$end' AND id_lap_perencanaan='$id_lap_perencanaan'")->result();
		echo json_encode($data);
	}


	public function pekerjaan_tanggal()
	{
		$tanggal=$this->input->post("tanggal");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
//		echo $tanggal;

		$tanggal=explode('/',$tanggal);

		$strTangga=$tanggal[2]."/".$tanggal[1]."/".$tanggal[0];
		$strTangga=strtotime($strTangga);
		$strTangga = date('Y-m-d',$strTangga);
//		echo $strTangga;

//		Select data dari database
		$data=$this->db->query("SELECT * FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan='$strTangga' AND id_lap_perencanaan='$id_lap_perencanaan'")->result();
		echo json_encode($data);
//		echo "SELECT * FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan='$tanggal'";

	}


	public function info()
	{
		$id_laper=$this->input->post("id_laper");
		$data=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$id_laper))->result();
		echo json_encode($data);
	}

	public function nilai_paket()
	{
		$id_paket1=$this->input->post("id_paket");
		$id_paket=$this->db->get_where("paket",array("id_paket"=>$id_paket1))->result();
		echo json_encode($id_paket);
	}

	public function bidang()
	{
		$id_konfigurasi=$this->input->post("id_konfigurasi");
		$get=$this->db->get_where("konfigurasi",array("id_konfigurasi"=>$id_konfigurasi))->result();

		echo json_encode($get);
	}


}
