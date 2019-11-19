<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catur_wulan extends CI_Controller {

	public function index()
	{

		$this->load->view("user/generate_catur");
	}



}
