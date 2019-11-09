<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$postData = $this->input->post();
		$query = $this->db->get_where('account', array('nip' => $postData['username'],'password' => $postData['password']));
		foreach ($query->result() as $row)
		{
			$nip=$row->nip;
			$nama=$row->nama;
			$privilage=$row->privilage;
		}

		if ($query->num_rows()) {
			$data= array(
				'nip'=>$nip,
				'nama'=>$nama,
				'privilage'=>$privilage
			);
//			Set Session


			$this->session->set_userdata($data);
			if($privilage==1)
			{

				redirect(base_url()."admin");
			}
			else if($privilage==2)
			{
				redirect(base_url()."user");
			}

		} else {
			redirect(base_url());
		}


	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
}
