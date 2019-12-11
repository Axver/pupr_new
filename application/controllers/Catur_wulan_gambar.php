<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catur_wulan_gambar extends CI_Controller
{

	public function index()
	{
		$this->load->view('user/gambar_tahap');
	}

	public function hapus_gambar()
	{
		$gambar = $this->input->post("image");

		// Hapus


		$this->db->query("DELETE FROM gambar_tahap WHERE gambar='$gambar'");



		$target = "gambar/" . $gambar;
		unlink($target);
	}
}
