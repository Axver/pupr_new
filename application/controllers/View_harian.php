<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_harian extends CI_Controller {

	public function index($id)
	{

		$this->load->view("user/view_harian");
	}


}
