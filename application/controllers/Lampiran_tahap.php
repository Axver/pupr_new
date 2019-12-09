<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lampiran_tahap extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));

	}


	public function index()
	{
      $this->load->view("user/lampiran_tahap");
	}


}
