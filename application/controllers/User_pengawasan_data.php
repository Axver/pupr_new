<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_pengawasan_data extends CI_Controller {

	public function index()
	{

		$this->load->view('user/user_pengawasan_data');
	}

	public function view($id)
	{
		$data['data']=$this->db->get_where("detail_laporan_pengawasan",array("id_lap_pengawasan"=>$id))->result();
		$this->load->view('user/user_pengawasan_view',$data);
	}





}
