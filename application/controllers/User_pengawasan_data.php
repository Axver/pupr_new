<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_pengawasan_data extends CI_Controller {

	public function index()
	{

		$this->load->view('user/user_pengawasan_data');
	}

	public function view($id,$id2,$id3)
	{
		$data['data']=$this->db->get_where("detail_laporan_pengawasan",array("id_lap_pengawasan"=>$id,"id_lap_perencanaan"=>$id2,"minggu"=>$id3))->result();
		$this->load->view('user/user_pengawasan_view',$data);
	}

	public function edit($id,$id2,$id3)
	{
		$data['data']=$this->db->get_where("detail_laporan_pengawasan",array("id_lap_pengawasan"=>$id,"id_lap_perencanaan"=>$id2,"minggu"=>$id3))->result();
		$this->load->view('user/user_pengawasan_edit',$data);
	}

	public function lampiran($id,$id2,$id3)
	{
		$data['data']=$this->db->get_where("detail_laporan_pengawasan",array("id_lap_pengawasan"=>$id,"id_lap_perencanaan"=>$id2,"minggu"=>$id3))->result();
		$this->load->view('user/user_pengawasan_lampiran',$data);
	}





	public function tambah_detail_pengawasan()
	{

		$dataArray=$this->input->post("dataArray");
		$id_pengawasan=$this->input->post("id_pengawasan");
		$id_laper=$this->input->post("id_laper");
		$minggu=$this->input->post("minggu");


        $id=0;
//	Ambil id
		$id_nya=$this->db->query("SELECT MAX(CAST(id AS INT) ) as max FROM detail_laporan_pengawasan")->result();
        $count=count($id_nya);
        if($count>0)
		{
			$id=$id_nya[0]->max;
		}

		$id=$id+1;

		$input=array(
			"id"=>$id,
			"id_lap_pengawasan"=>$id_pengawasan,
			"jenis_pekerjaan"=>$dataArray[0],
			"jumlah_pekerja"=>$dataArray[1],
			"jenis_satuan"=>$dataArray[2],
			"satuan"=>$dataArray[3],
			"jumlah_satuan"=>$dataArray[4],
			"progres"=>$dataArray[5],
			"id_lap_perencanaan"=>$id_laper,
			"minggu"=>$minggu,
		);

//	Input data
		$this->db->insert("detail_laporan_pengawasan",$input);
//	var_dump($input);


	}

	public function hapus()
	{


		$dataArray=$this->input->post("dataArray");
		$id_pengawasan=$this->input->post("id_pengawasan");
		$id_laper=$this->input->post("id_laper");
		$minggu=$this->input->post("minggu");


		//		Hapus data dulu
		$this->db->query("DELETE FROM detail_laporan_pengawasan WHERE id_lap_pengawasan='$id_pengawasan' AND id_lap_perencanaan='$id_laper' AND minggu='$minggu'");

	}


	public function ttd()
	{
		$id_pengawasn=$this->input->post("id_pengawasan");
		$id_laper=$this->input->post("id_laper");
		$minggu=$this->input->post("minggu");
		$id_diperiksa=$this->input->post("id_diperiksa");

//		Hapus dulu datanya
		$this->db->query("DELETE FROM ttd_pengawasan WHERE minggu='$minggu' AND id_pengawasan='$id_pengawasn' AND id_perencanaan='$id_laper'");

		$max=0;

//Input kemudian
		$data=array(
		"minggu"=>$minggu,
		"id_pengawasan"=>$id_pengawasn,
			"id_perencanaan"=>$id_laper,
			"id_dibuat"=>$this->session->userdata("nip"),
			"id_diperiksa"=>$id_diperiksa,
		);

//		Input
		$this->db->insert("ttd_pengawasan",$data);
	}


	public function get_ttd()
	{
		$id_pengawasn=$this->input->post("id_pengawasan");
		$id_laper=$this->input->post("id_laper");
		$minggu=$this->input->post("minggu");

		$data=$this->db->get_where("ttd_pengawasan",array("minggu"=>$minggu,"id_pengawasan"=>$id_pengawasn,"id_perencanaan"=>$id_laper))->result();
		echo json_encode($data);
	}







}
