<?php

class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index($id){
		$this->load->view('v_upload', array('error' => ' ' ));
	}

	public function aksi_upload($id){
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
//			Ubah Data Yg DIdatabase Dulu Gan
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];
			$inputGambar=array(
			"id_lap_harian"=>$id,
				"gambar"=>$file_name,
			);

			$this->db->insert("gambar_harian",$inputGambar);


			redirect('.user_harian_data');
		}
	}

}
