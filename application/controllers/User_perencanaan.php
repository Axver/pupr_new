<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_perencanaan extends CI_Controller {

	public function index()
	{
		$data=$this->session->userdata("nip");
//		var_dump($data);
		$get_perencanaan=$this->db->get_where("detail_paket",array("nip"=>$data))->result();


		$count=count($get_perencanaan);

		$finalData['data']= array();

		$i=0;
		while($i<$count)
		{
			$info=$this->db->get_where("lap_perencanaan",array("id_paket"=>$get_perencanaan[$i]->id_paket))->result();

			array_push($finalData['data'],$info);
			$i++;
		}
//		Getting All Laporan Perencanaan


		$this->load->view('user/perencanaan_detil',$finalData);
	}


}
