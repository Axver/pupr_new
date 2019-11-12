<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_harian extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('upload_model');
	}

	public function index($i)
	{
		$this->load->view('user/harian');
	}

	function do_upload(){
		$config['upload_path']="./assets/images";
		$config['allowed_types']='gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
			$data = array('upload_data' => $this->upload->data());

			$title= $this->input->post('title');
			$image= $data['upload_data']['file_name'];

			$result= $this->upload_model->save_upload($title,$image);
			echo json_decode($result);
		}

	}


}
