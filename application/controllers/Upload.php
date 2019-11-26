<?php

class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));

	}

	public function index($id){
		$this->load->view('v_upload', array('error' => ' ' ));
	}

	public function perencanaan($id){
		$this->load->view('p_upload', array('error' => ' ' ));
	}

	public function pengawasan($id){
		$this->load->view('pp_upload', array('error' => ' ' ));
	}

	public function aksi_upload($id,$perencanaan){
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$config['encrypt_name'] = TRUE;

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
				"id_perencanaan"=>$perencanaan,
				"gambar"=>$file_name,
			);

			$this->db->insert("gambar_harian",$inputGambar);


			redirect('user_harian_data');
		}
	}


	public function aksi_upload_perencanaan($id){
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
//			Ubah Data Yg DIdatabase Dulu Gan
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];
//			Ambil id Gambar
			$max=0;
			$datax=$this->db->query("SELECT MAX(CAST(id_gambar AS INT)) as max FROM gambar_perencanaan")->result();

			$count=count($datax);
			if($count>0)
			{
				$max=$datax[0]->max;
			}
			$max=$max+1;

			$inputGambar=array(
				"id_gambar"=>$max,
				"id_lap_perencanaan"=>$id,
				"gambar"=>$file_name,
			);

			$this->db->insert("gambar_perencanaan",$inputGambar);


			redirect('user_perencanaan');
		}
	}

	public function aksi_upload_pengawasan($id,$per,$minggu){
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
//			Ubah Data Yg DIdatabase Dulu Gan
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];
//			Ambil id Gambar
			$max=0;
			$datax=$this->db->query("SELECT MAX(CAST(id_gambar AS INT)) as max FROM gambar_pengawasan")->result();


			$count=count($datax);
			if($count>0)
			{
				$max=$datax[0]->max;
			}
			$max=$max+1;

			$inputGambar=array(
				"id_gambar"=>$max,
				"id_perencanaan"=>$per,
				"minggu"=>$minggu,
				"id_pengawasan"=>$id,
				"gambar"=>$file_name,
			);

			$this->db->insert("gambar_pengawasan",$inputGambar);


			redirect('user_pengawasan_data');
		}
	}


	public function hapus()
	{
       $harian=$this->input->post("harian");
       $perencanaan=$this->input->post("perencanaan");
		$nama=$this->input->post("nama");

//       Hapus

		$this->db->query("DELETE FROM gambar_harian WHERE id_lap_harian='$harian' AND id_perencanaan='$perencanaan' AND gambar='$nama'");
	}

	public function hapus1()
	{

		$perencanaan=$this->input->post("perencanaan");
		$nama=$this->input->post("nama");

//       Hapus

		$this->db->query("DELETE FROM gambar_perencanaan WHERE  id_lap_perencanaan='$perencanaan' AND gambar='$nama'");
	}

	public function hapus2()
	{

		$perencanaan=$this->input->post("perencanaan");
		$nama=$this->input->post("nama");
		$pengawasan=$this->input->post("pengawasan");
		$minggu=$this->input->post("minggu");

//       Hapus

		$this->db->query("DELETE FROM gambar_pengawasan WHERE  id_perencanaan='$perencanaan' AND gambar='$nama' AND minggu='$minggu' AND id_pengawasan='$pengawasan'");
	}

}
