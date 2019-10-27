<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pengawasan extends CI_Controller {

	public function index()
	{
		$this->load->view('laporan/laporan_pengawasan');
	}
}
