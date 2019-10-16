<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function index()
	{

	}
	public function perencanaan()
	{
      $this->load->view('cetak/perencanaan');
	}
}
