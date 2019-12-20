<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catur_wulan_baru extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view("user/generate_catur_baru");
	}


	public function sketsa()
	{

		$id_paket = $this->input->post("id_paket");
		$id_perencanaan = $this->input->post("id_perencanaan");
		$bulan = $this->input->post("bulan");
		$bulan_z=$this->input->post("bulan_z");

		$this->db->select('*');
		$this->db->from('gambar_tahap');
		$this->db->join('jenis_pekerjaan', 'gambar_tahap.jenis_pekerjaan = jenis_pekerjaan.id');
		$this->db->where("id_paket", $id_paket);
		$this->db->where("id_perencanaan", $id_perencanaan);
		$this->db->where("bulan_start", $bulan);
		$this->db->where("bulan_end", $bulan_z);


		$data = $this->db->get()->result();

		echo json_encode($data);
	}


	public function informasi()
	{
		$id_paket = $this->input->post("id_paket");
		$data = $this->db->get_where("paket", array("id_paket" => $id_paket))->result();

		echo json_encode($data);


		// echo $id_paket;
	}


	public function informasi1()
	{ }
}
