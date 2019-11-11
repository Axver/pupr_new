<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_harian extends CI_Controller {

	public function index($i)
	{
		$this->load->view('user/harian');
	}


}
