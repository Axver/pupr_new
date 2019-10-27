<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pelaksanaan extends CI_Controller {

	public function index()
	{
		$this->load->view('laporan/laporan_pelaksanaan');
	}
}
