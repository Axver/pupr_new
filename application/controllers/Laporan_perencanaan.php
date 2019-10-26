<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_perencanaan extends CI_Controller {

	public function index()
	{
		$sel_paket=$this->db->get("paket")->result();
		$query=$this->db->get("jenis_pekerjaan")->result();
		$query1=$this->db->get("jenis_bahan_alat")->result();
		$data['pekerjaan']=$query;
		$data['alat']=$query1;
		$data['paket']=$sel_paket;
		$this->load->view('laporan/laporan_perencanaan',$data);
	}

	public function add_perencanaan()
	{
       $id_paket=$this->input->post('id_paket');

       $id_paket=explode("_",$id_paket);
       $id_paket_=$id_paket[0];
		  $tahun=$id_paket[1];
//       $tahun=$this->input->post('tahun');

//       Getting Last Input Id
		$max=$this->db->query("SELECT MAX(id_lap_perencanaan) as id FROM lap_perencanaan")->result();
		$max_id=$max[0]->id;
		$max_id=$max_id+1;
		$data=array(
			'id_lap_perencanaan'=>$max_id,
			'id_paket'=>$id_paket_,
			'tahun'=>$tahun,

		);

//		$this->db->insert("lap_perencanaan",$data);

//		var_dump($data);;

//		Input Laporan Perencanaan


	}

	public function add_jenis_pekerjaan()
	{

		$data=$this->input->post("data");
		$jumlah=$this->input->post("data1");

//		Select id First
		$lap_perencanaan=$this->db->query("SELECT * FROM `lap_perencanaan` WHERE id_lap_perencanaan=(SELECT MAX(id_lap_perencanaan) FROM lap_perencanaan)")->result();
//        var_dump($lap_perencanaan[0]->id_lap_perencanaan);
        $id_lap_perencanaan=$lap_perencanaan[0]->id_lap_perencanaan;
        $id_paket=$lap_perencanaan[0]->id_paket;
        $tahun=$lap_perencanaan[0]->tahun;

        $data_length=count($data);
        $i=0;

        while($i<$data_length)
		{
			$data_=explode("_",$data[$i]);
			$jumlah_=explode("_",$jumlah[$i]);
            $id=$data_[0];
            $pekerja=$jumlah_[0];

            $data_input= array(
            	"id"=>$id,
				"id_lap_perencanaan"=>$id_lap_perencanaan,
				"id_paket"=>$id_paket,
				"tahun"=>$tahun,
				"tukang"=>"",
				"pekerja"=>$pekerja
			);

            var_dump($data_input);


//			Input data tabel Jenis Pekerjaan Disini

			$i++;
		}

//		Input data ke tabel waktu_pekerjaan Disini





	}
}
