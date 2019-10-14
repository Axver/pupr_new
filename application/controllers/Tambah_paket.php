<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_paket extends CI_Controller {

	public function index()
	{
		$now = date('Y-m-d H:i:s');
			$postData = $this->input->post();
			$data= array(
				'id_paket'=>$postData['id_paket'],
				'tahun'=>$postData['tahun'],
				'data_created'=>$now
			);
//			var_dump($data);
		$final=$this->db->insert('paket', $data);
		if($final)
		{
			$this->session->set_flashdata('Successfully','Paket Sukses Di tambahkan');
		}
		else
		{
			$this->session->set_flashdata('Successfully','Gagal Menambahkan Paket');
		}
		// redirect page were u want to show this massage.
		redirect('paket','refresh');

	}
}
