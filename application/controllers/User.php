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

		$this->db->insert("lap_harian_mingguan",$data);

//       var_dump($data);

		echo $hari_tanggal;
	}


//	Fungsi detail harian

public function detail_harian()
{
	$data=$this->input->post("data");
	$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
	$id_paket=$this->input->post("id_paket");
//	Dapatkan Tahun

	$getTahun=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
	$tahun=$getTahun[0]->tahun;

//	Dapatkan Id Detail Laporan Harian

	$id_lapharian_mingguan=$this->input->post("id_lapharmin");

	$inti= array(
		"id_lap_harian_mingguan"=>$id_lapharian_mingguan,
		"id_lap_perencanaan"=>$id_lap_perencanaan,
		"id_paket"=>$id_paket,
		"tahun"=>$tahun
	);


	$count=count($data);

	$perulangan=$count/5;


	$i=0;
	$x=0;
	$arr3=array(

	);
	while($i<$perulangan)
	{
		$j=0;
		while ($j<5)
		{
//			echo $x;
			if($j==0)
			{
				$final=array(
					'jenis_pekerja'=>$data[$x],
				);
			}
			else if($j==1)
			{
				$final=array(
					'jumlah_pekerja'=>$data[$x],
				);
			}

			else if($j==2)
			{
				$final=array(
					'id_jenis_bahan_alat'=>$data[$x],
				);
			}
			else if($j==3)
			{
				$final=array(
					'id_satuan'=>$data[$x],
				);
			}
			else if($j==4)
			{
				$final=array(
					'jumlah_bahan'=>$data[$x],
				);
			}
            $arr3=$arr3+$final;

            $x++;
			$j++;
		}

//		echo "hahahaha";
//		var_dump($arr3+$inti);
		$arr3=$arr3+$inti;
		$this->db->insert("detail_bahan_alat_harian",$arr3);
//		echo "hahaha";

		$arr3=array(

		);


		$i++;
	}






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

	$totalData=count($hasilData);



}





}
