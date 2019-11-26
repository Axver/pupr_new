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
			$this->db->select('*');
			$this->db->from('lap_perencanaan');
			$this->db->join('paket', 'lap_perencanaan.id_paket = paket.id_paket');
			$this->db->where('lap_perencanaan.id_paket',$get_perencanaan[$i]->id_paket);
//			$info=$this->db->get_where("lap_perencanaan",array("id_paket"=>$get_perencanaan[$i]->id_paket))->result();
			$info=$this->db->get()->result();
			array_push($finalData['data'],$info);
			$i++;
		}
//		Getting All Laporan Perencanaan


		$this->load->view('user/perencanaan_detil',$finalData);
	}


}
