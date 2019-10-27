<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_harian extends CI_Controller {

	public function index()
	{
		$this->load->view('laporan/laporan_harian');
	}
}
