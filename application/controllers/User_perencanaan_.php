<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_perencanaan_ extends CI_Controller {

	public function index()
	{
		$this->load->view("user/user_perencanaan_");
	}


	public function perencanaan()
	{
		$perencanaan=$this->input->post("id_paket");
		$data=$this->db->query("SELECT * FROM lap_perencanaan WHERE id_paket='$perencanaan'")->result();
		echo json_encode($data);
	}


}
