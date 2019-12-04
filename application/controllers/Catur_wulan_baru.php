<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catur_wulan_baru extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));

	}

    public function index()
    {
        $this->load->view("user/generate_catur_baru");
    }

}