<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{

		$this->load->view('user/dashboard');
	}





	public function lihat_paket($data)
	{
		$this->load->view('user/lihat_paket');
	}

	public function perencanaan($data)
	{
		$sel_paket=$this->db->get("paket")->result();
		$query=$this->db->get("jenis_pekerjaan")->result();
		$query1=$this->db->get("jenis_bahan_alat")->result();
		$data1['pekerjaan']=$query;
		$data1['alat']=$query1;
		$data1['paket']=$sel_paket;
		$this->load->view('user/perencanaan',$data1);
	}

	public function detail_paket()
	{
		$id_paket=$this->input->post("id_paket");

		$query=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
		echo json_encode($query);
	}


	public function user_harian($i)
	{
        $this->load->view("user/harian");
	}


	public function paket_info_harian()
	{
       $send_data=$this->input->post("send_data");
       $get_info=$this->db->get_where("paket",array("id_paket"=>$send_data))->result();
//       Select Data Info
       echo json_encode($get_info);
	}


	public function save_harian()
	{
       $id_paket=$this->input->post("id_paket");
       $id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
       $hari_tanggal=$this->input->post("hari_tanggal");

//       Getting Tahun Paket From DB
		$getTahun=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
        $tahun=$getTahun[0]->tahun;
//        Cari Max Nilai Sekarang
//		$getMax=$this->db->query("SELECT MAX(id_lap_harian_mingguan) as max FROM lap_harian_mingguan")->result();
//		$max=$getMax[0]->max();
//		$max=$max+1;
		$this->db->select_max('id_lap_harian_mingguan');
		$this->db->from('lap_harian_mingguan');




        $data= array(
        	"id_lap_harian_mingguan"=>$hari_tanggal,
        "id_lap_perencanaan"=>$id_lap_perencanaan,
		"id_paket"=>$id_paket,
		"tahun"=>$tahun,
			"hari_tanggal"=>$hari_tanggal,

		);

//        Save Data Then (Simpan Data Laporan Harian DI Database)

//		$this->db->insert("lap_harian_mingguan",$data);

//       var_dump($data);
	}


//	Fungsi detail harian

public function detail_harian()
{
	$data=$this->input->post("data");
	$count=count($data);


	$i=0;
	$j=0;
	$x=0;


	while($i<$count)
	{
		if($i!=0&&$i%5!=0)
		{
			$hasilData[$x][$j]=$data[$i];
			$j++;
		}
		else
		{
			$x++;

			$j=0;
		}

		$i++;

	}
	var_dump($hasilData);

var_dump($data);


}





}
