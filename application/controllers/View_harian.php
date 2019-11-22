<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_harian extends CI_Controller {

	public function index($id)
	{
		$data=$this->db->get_where("lap_harian_mingguan",array("id_lap_harian_mingguan"=>$id))->result();
		$data['lapar']=array(
		"lapar"=>$data,
		);

		$this->load->view("user/view_harian",$data);
	}

	public function get_paket()
	{
      $id_paket=$this->input->post("id_paket");
      $getPaket=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();

      echo json_encode($getPaket);
	}

	public function data_tabel()
	{
		$id_harian=$this->input->post("id_harian");
		$id_paket=$this->input->post("id_paket");
		$this->db->select('*');
		$this->db->from('detail_bahan_alat_harian');
		$this->db->join('jenis_bahan_alat', 'jenis_bahan_alat.id_jenis_bahan_alat = detail_bahan_alat_harian.id_jenis_bahan_alat');
		$this->db->join('jenis_pekerjaan', 'jenis_pekerjaan.id = detail_bahan_alat_harian.jenis_pekerja');
		$this->db->join('satuan', 'satuan.id_satuan = detail_bahan_alat_harian.id_satuan');
		$this->db->where('detail_bahan_alat_harian.id_lap_harian_mingguan', $id_harian);
		$this->db->where('detail_bahan_alat_harian.id_paket', $id_paket);

//		$selectData=$this->db->get_where("detail_bahan_alat_harian",array("id_lap_harian_mingguan"=>$id_harian))->result();
        $selectData=$this->db->get()->result();
		echo json_encode($selectData);
	}


	public function get_gambar()
	{
		$id_lap=$this->input->post("id_harian");
		$id_perencanaan=$this->input->post("id_perencanaan");



//		Ambil nama gambar didatabase
//
		$data=$this->db->get_where("gambar_harian",array("id_lap_harian"=>$id_lap,"id_perencanaan"=>$id_perencanaan))->result();

		echo json_encode($data);
	}

	public function edit($id,$per)
	{
		$data=$this->db->get_where("lap_harian_mingguan",array("id_lap_harian_mingguan"=>$id,"id_lap_perencanaan"=>$per))->result();
		$data['lapar']=array(
			"lapar"=>$data,
		);

		$this->load->view("user/view_harian_edit",$data);
	}

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

		//		Detele semua data terlebih dahulu
		$this->db->query("DELETE FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan='$id_lapharian_mingguan' AND id_lap_perencanaan='$id_lap_perencanaan' AND id_paket='$id_paket'");
        echo "DELETE FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan='$id_lapharian_mingguan' AND id_lap_perencanaan='$id_lap_perencanaan' AND id_paket='$id_paket'";
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


	public function get_bawah()
	{
		$id_harian=$this->input->post("id_harian");
		$id_perencanaan=$this->input->post("id_perencanaan");

//		Select Dari DB
		$data=$this->db->get_where("detail_laporan_harian",array("id_lap_harian"=>$id_harian,"id_perencanaan"=>$id_perencanaan))->result();

		echo json_encode($data);
	}


	public function ttd()
	{
       $id_diperiksa=$this->input->post("id_diperiksa");
       $id_laper=$this->input->post("id_laper");
       $id_harian=$this->input->post("id_harian");

//Hapus data lama dulu
		$this->db->query("DELETE FROM ttd_harian WHERE id_lap_perencanaan='$id_laper' AND id_lap_harian='$id_harian'");
//Input data baru
//		Max
		$max=0;

		$max_data=$this->db->query("SELECT MAX(CAST(id_ttd_harian AS INT))as max FROM ttd_harian ")->result();
		$count=count($max_data);
		$i=0;

		while($i<$count)
		{
			$max=$max_data[$i]->max;

			$i++;
		}

		$max=$max+1;
//Setelah Max DIdapatkan segera input data
		$data=array(
		"id_lap_harian"=>$id_harian,
		"id_lap_perencanaan"=>$id_laper,
		"id_ttd_harian"=>$max,
			"id_dibuat"=>$this->session->userdata("nip"),
			"id_diperiksa"=>$id_diperiksa
		);

		$this->db->insert("ttd_harian",$data);

	}

	public function get_ttd()
	{
		$id_laper=$this->input->post("id_laper");
		$hari_tanggal=$this->input->post("hari_tanggal");

		$data=$this->db->get_where("ttd_harian",array("id_lap_harian"=>$hari_tanggal,"id_lap_perencanaan"=>$id_laper))->result();
		echo json_encode($data);
	}


}
