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

//		Kemudian pilih id paketnya dari id perencanaan tersebut
		echo json_encode($query);
	}

	public function detail_paket1()
	{
		$id_paket=$this->input->post("id_paket");

		$query=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$id_paket))->result();

		$count=count($query);
		$i=0;

		while($i<$count)
		{
			$id_paket_baru=$this->db->get_where("paket",array("id_paket"=>$query[$i]->id_paket))->result();

			$i++;
		}

//		Kemudian pilih id paketnya dari id perencanaan tersebut

		echo json_encode($id_paket_baru);
	}


	public function user_harian($i)
	{
        $this->load->view("user/harian");
	}

	public function user_harian_baru($i)
	{
		$this->load->view("user/harian_baru");
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



public function user_pengawasan_create($i)

{
   $this->load->view("user/user_pengawasan");
}

	public function user_pengawasan_create_baru($i)

	{
		$this->load->view("user/user_pengawasan_baru");
	}


public function save_pengawasan()
{
// Dapatkan id laporan pengawasan
//	$get_id=$this->db->query("SELECT MAX(id_lap_pengawasan) as max FROM lap_pengawasan")->result();
//	$max=$get_id[0]->max;
//	$max=$max+1;



	$id_paket=$this->input->post("id_paket");
	$minggu=$this->input->post("minggu");
	$id_lap_perencanaan=$this->input->post("id_laper");
	$id_lap_pengawasan=date("Y/m/d");

//	Dapatkan Tahunnya
	$tahun=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
	$tahun=$tahun[0]->tahun;


	$data=array(
		"id_paket"=>$id_paket,
		"minggu"=>$minggu,
		"id_lap_perencanaan"=>$id_lap_perencanaan,
		"id_lap_pengawasan"=>$id_lap_pengawasan,
		"tahun"=>$tahun,
	);

	$input=$this->db->insert("lap_pengawasan",$data);

//	var_dump($data);
	echo $id_lap_pengawasan;

}


public function tambah_detail_pengawasan()
{
	$dataArray=$this->input->post("dataArray");
	$id_pengawasan=$this->input->post("id_pengawasan");
	$id_laper=$this->input->post("id_laper");
	$minggu=$this->input->post("minggu");

//	Ambil id
	$id_nya=$this->db->query("SELECT MAX(id) as max FROM detail_laporan_pengawasan")->result();

	$id=$id_nya[0]->max;
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


public function pekerjaan()
{
//  Get Jenis Pekerjaan
	$jenis_pekerjaan=$this->input->post("jenis_pekerjaan");
	$max=0;
//	Select Max id
	$max_id=$this->db->query("SELECT MAX(CAST(id AS INT)) as max FROM jenis_pekerjaan")->result();

	$max=$max_id[0]->max;
	$max=$max+1;
//	Input Ke database
	$data=array(
	"id"=>$max,
	"nama_jenis"=>$jenis_pekerjaan,
	);

	$this->db->insert("jenis_pekerjaan",$data);
}

	public function bahan()
	{
//  Get Jenis Pekerjaan
		$jenis_bahan=$this->input->post("jenis_bahan");
//	Select Max id
		$max_id=$this->db->query("SELECT MAX(id_jenis_bahan_alat) as max FROM jenis_bahan_alat")->result();

		$max=$max_id[0]->max;
		$max=$max+1;
//	Input Ke database
		$data=array(
			"id_jenis_bahan_alat"=>$max,
			"jenis_bahan_alat"=>$jenis_bahan,
		);

		$this->db->insert("jenis_bahan_alat",$data);
	}


	public function perencanaan_alat()
	{
		$data=$this->input->post("data");
		$minggu=$this->input->post("minggu");
		$id_lap=$this->input->post("id_lap");
		$id_paket=$this->input->post("id_paket");
		$tahun=$this->input->post("tahun");

		$id_paket=explode("_",$id_paket);


//		Cari Tahu Jumlahnya terlebih dahulu
		$jumlah=count($minggu);
		$i=0;
        echo "*&*&*&*&";
		echo $jumlah;
		echo "Xkalskalks";

		while($i<$jumlah)
		{
			$tempData=explode("___",$minggu[$i]);
			echo "#####";
			var_dump($tempData);
			echo "####";
			$tempData1=explode("_",$data[$i]);

//			var_dump($tempData);


			$idDetil=$this->db->query("SELECT MAX(CAST(id_detail_bahan_alat AS INT)) as max FROM detail_bahan_alat")->result();
			$idDetil=$idDetil[0]->max;
			$idDetil=$idDetil+1;

			$data_final=array(
				"id_lap_perencanaan"=>$id_lap,
				"Id_paket"=>$id_paket[0],
				"tahun"=>$id_paket[1],
				"id_detail_bahan_alat"=>$idDetil,
				"id_jenis_bahan_alat"=>$tempData[0],
				"id_satuan"=>$tempData1[1],
				"jumlah"=>$tempData1[0],
				"tanggal"=>$tempData1[2],
				"minggu"=>$tempData[1],
			);

			var_dump($data_final);
			$this->db->insert("detail_bahan_alat",$data_final);
			$i++;
		}
	}

	public function perencanaan_alat1()
	{

		$data=$this->input->post("data");
		$minggu=$this->input->post("minggu");
		$id_lap=$this->input->post("id_lap");
		$id_paket=$this->input->post("id_paket");
		$tahun=$this->input->post("tahun");

//		DELETE
		$this->db->query("DELETE FROM detail_bahan_alat WHERE id_lap_perencanaan='$id_lap'");

		$id_paket=explode("_",$id_paket);


//		Cari Tahu Jumlahnya terlebih dahulu
		$jumlah=count($minggu);
		$i=0;
//		echo "*&*&*&*&";
//		echo $jumlah;
//		echo "Xkalskalks";

		while($i<$jumlah)
		{
			$tempData=explode("___",$minggu[$i]);
//			echo "#####";
			var_dump($tempData);
//			echo "####";
			$tempData1=explode("_",$data[$i]);

//			var_dump($tempData);

			$idDetil=$this->db->query("SELECT MAX(CAST(id_detail_bahan_alat AS INT)) as max FROM detail_bahan_alat")->result();
			$idDetil=$idDetil[0]->max;
			$idDetil=$idDetil+1;

			$data_final=array(
				"id_lap_perencanaan"=>$id_lap,
				"Id_paket"=>$id_paket[0],
				"tahun"=>$id_paket[1],
				"id_detail_bahan_alat"=>$idDetil,
				"id_jenis_bahan_alat"=>$tempData[0],
				"id_satuan"=>$tempData1[1],
				"jumlah"=>$tempData1[0],
				"tanggal"=>$tempData1[2],
				"minggu"=>$tempData[1],
			);

			var_dump($data_final);
			$this->db->insert("detail_bahan_alat",$data_final);
			$i++;
		}
	}


	public function update_info()
	{
		$data=$this->input->post("data");
		$id=$this->input->post("id");
//		$data=array(
//            "lokasi"=>$data[0],
//			"jenis_pekerjaan"=>$data[1],
//			"panjang_penanganan"=>$data[2],
//			"keterangan_dimensi"=>$data[3],
//			"keterangan"=>$data[4],
//		);

		var_dump($data);

//		$this->db->set('lokasi', $data[0]);
//		$this->db->set('jenis_pekerjaan', $data[1]);
//		$this->db->set('panjang_penanganan', $data[2]);
//		$this->db->set('keterangan_dimensi', $data[3]);
//		$this->db->set('keterangan', $data[4]);
//		$this->db->where('id_lap_perencanaan', $id);
//		$this->db->update('lap_perencanaan');

//		$this->db->where('id_lap_perencanaan', $id);
//		$this->db->update('lap_perencanaan', $data);

//		$this->db->where('id_lap_perencanaan', $id);
//		$this->db->update('lap_perencanaan', $data);

		$this->db->query("UPDATE lap_perencanaan SET lokasi = '$data[0]',jenis_pekerjaan = '$data[1]', panjang_penanganan = '$data[2]', keterangan_dimensi = '$data[3]',keterangan = '$data[4]' WHERE id_lap_perencanaan='$id'");

//		echo ("UPDATE lap_perencanaan SET lokasi = '$data[0]',jenis_pekerjaan = '$data[1]', panjang_penanganan = '$data[2]', keterangan_dimensi = '$data[3]',keterangan = '$data[4]' WHERE id_lap_perencanaan='$id'");
	}


	public function update_info1()
	{
		$data=$this->input->post("data");
		$id=$this->input->post("id");
//		$data=array(
//            "lokasi"=>$data[0],
//			"jenis_pekerjaan"=>$data[1],
//			"panjang_penanganan"=>$data[2],
//			"keterangan_dimensi"=>$data[3],
//			"keterangan"=>$data[4],
//		);

		var_dump($data);

//		$this->db->set('lokasi', $data[0]);
//		$this->db->set('jenis_pekerjaan', $data[1]);
//		$this->db->set('panjang_penanganan', $data[2]);
//		$this->db->set('keterangan_dimensi', $data[3]);
//		$this->db->set('keterangan', $data[4]);
//		$this->db->where('id_lap_perencanaan', $id);
//		$this->db->update('lap_perencanaan');

//		$this->db->where('id_lap_perencanaan', $id);
//		$this->db->update('lap_perencanaan', $data);

//		$this->db->where('id_lap_perencanaan', $id);
//		$this->db->update('lap_perencanaan', $data);

		$this->db->query("UPDATE lap_perencanaan SET lokasi = '$data[0]',jenis_pekerjaan = '$data[1]', panjang_penanganan = '$data[2]', keterangan_dimensi = '$data[3]',keterangan = '$data[4]' WHERE id_lap_perencanaan='$id'");

//		echo ("UPDATE lap_perencanaan SET lokasi = '$data[0]',jenis_pekerjaan = '$data[1]', panjang_penanganan = '$data[2]', keterangan_dimensi = '$data[3]',keterangan = '$data[4]' WHERE id_lap_perencanaan='$id'");
	}


	public function ttd_perencanaan()
	{

		$id_perencanaan=$this->input->post("id_perencanaan");
		$diperiksa_oleh=$this->input->post("diperiksa_oleh");
		$disetujui_oleh=$this->input->post("disetujui_oleh");

//		Select ID
		$max=0;
		$max_id=0;

		$max_id_=$this->db->query("SELECT MAX(CAST(id_ttd AS INT)) as max FROM ttd_perencanaan")->result();
		$count=count($max_id);
		$i=0;
		while($i<$count)
		{
			$max_id=$max_id_[0]->max;

			$i++;
		}

		$max=$max_id+1;

		$id_user=$this->session->userdata("nip");

		$data=array(
			"id_ttd"=>$max,
			"id_lap_perencanaan"=>$id_perencanaan,
			"id_disetujui"=>$disetujui_oleh,
			"id_diperiksa"=>$diperiksa_oleh,
			"id_user"=>$id_user,
		);

		var_dump($data);
		$this->db->insert("ttd_perencanaan",$data);

	}


	public function ttd_perencanaan1()
	{

		$id_perencanaan=$this->input->post("id_perencanaan");
		$diperiksa_oleh=$this->input->post("diperiksa_oleh");
		$disetujui_oleh=$this->input->post("disetujui_oleh");

//		Delete Terlebih Dahulu
		$this->db->query("DELETE FROM ttd_perencanaan WHERE id_lap_perencanaan='$id_perencanaan'");

//		Select ID
		$max_id=0;
		$max_id_=$this->db->query("SELECT MAX(CAST(id_ttd AS INT)) as max FROM ttd_perencanaan")->result();
		$count=count($max_id_);
		$i=0;
		while($i<$count)
		{
			$max_id=$max_id_[0]->max;

			$i++;
		}

		$max=$max_id+1;

		$id_user=$this->session->userdata("nip");

		$data=array(
			"id_ttd"=>$max,
			"id_lap_perencanaan"=>$id_perencanaan,
			"id_disetujui"=>$disetujui_oleh,
			"id_diperiksa"=>$diperiksa_oleh,
			"id_user"=>$id_user,
		);

		var_dump($data);
		$this->db->insert("ttd_perencanaan",$data);

	}


	public function chart()
	{
		$id_paket=$this->input->post("id_paket");




		$hitung1=0;
//								Cari kemudian paket perencanaannya
			$per = $this->db->get_where("lap_harian_mingguan", array("id_paket" => $id_paket))->result();
			$count1 = count($per);
			$ii = 0;
			while ($ii < $count1) {
				$hitung1++;

				$ii++;
			}



		$hitung2=0;
//								Cari kemudian paket perencanaannya
		$per = $this->db->get_where("lap_perencanaan", array("id_paket" => $id_paket))->result();
		$count1 = count($per);
		$ii = 0;
		while ($ii < $count1) {
			$hitung2++;

			$ii++;
		}


		$hitung3=0;
//								Cari kemudian paket perencanaannya
		$per = $this->db->get_where("lap_pengawasan", array("id_paket" => $id_paket))->result();
		$count1 = count($per);
		$ii = 0;
		while ($ii < $count1) {
			$hitung3++;

			$ii++;
		}


		$data=array(
          "harian"=>$hitung1,
			"perencanaan"=>$hitung2,
			"pengawasan"=>$hitung3

		);

		echo json_encode($data);




	}



	public function save_bawah()
	{
		$id_paket=$this->input->post("id_paket");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
		$hari_tanggal=$this->input->post("hari_tanggal");
		$mJenis=$this->input->post("mJenis");
		$mLokasi=$this->input->post("mLokasi");
		$mPenanganan=$this->input->post("mPenanganan");
		$mDimensi=$this->input->post("mDimensi");

//		Input Ke Database

		$data=array(
		"jenis_pekerjaan"=>$mJenis,
			"lokasi"=>$mLokasi,
			"panjang_penanganan"=>$mPenanganan,
			"dimensi"=>$mDimensi,
			"id_lap_harian"=>$hari_tanggal,
			"id_perencanaan"=>$id_lap_perencanaan,
			"id_paket"=>$id_paket,
		);

//		var_dump($data);

		$this->db->insert("detail_laporan_harian",$data);
	}




	public function save_bawah1()
	{
		$id_paket=$this->input->post("id_paket");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
		$hari_tanggal=$this->input->post("hari_tanggal");
		$mJenis=$this->input->post("mJenis");
		$mLokasi=$this->input->post("mLokasi");
		$mPenanganan=$this->input->post("mPenanganan");
		$mDimensi=$this->input->post("mDimensi");

//		Hapus DUlu
		$this->db->query("DELETE FROM detail_laporan_harian WHERE id_lap_harian='$hari_tanggal' AND id_perencanaan='$id_lap_perencanaan' AND id_paket='$id_paket'");

//		Input Ke Database

		$data=array(
			"jenis_pekerjaan"=>$mJenis,
			"lokasi"=>$mLokasi,
			"panjang_penanganan"=>$mPenanganan,
			"dimensi"=>$mDimensi,
			"id_lap_harian"=>$hari_tanggal,
			"id_perencanaan"=>$id_lap_perencanaan,
			"id_paket"=>$id_paket,
		);

//		var_dump($data);

		$this->db->insert("detail_laporan_harian",$data);
	}


	public function add_konfigurasi()
	{
		$nip=$this->input->post("nip");
		$nama=$this->input->post("nama");

//		Pilih id dahulu

		$max_id=$this->db->query("SELECT MAX(id_konfigurasi*1) as max FROM konfigurasi")->result();

		$count=count($max_id);
		if($count>0)
		{
			$max_id=$max_id[0]->max;
		}
		else
		{
			$max_id=0;
		}

		$max_id=$max_id+1;

		$data=array(
			"id_konfigurasi"=>$max_id,
			"nama"=>$nama,
			"nip"=>$nip,

		);

		$this->db->insert("konfigurasi",$data);

		var_dump($data);
	}



	public function baru_harian()
	{
		$id_perencanaan=$this->input->post("id_perencanaan");
		$id_paket=$this->input->post("id_paket");
		$id_harian=$this->input->post("id_harian");

//		Select tahun dulu
		$tahun=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
		$count=count($tahun);
		$i=0;


		$tahun1=0;
		while($i<$count)
		{

			$tahun1=$tahun[$i]->tahun;

			$i++;
		}


		$data=array(
		"id_lap_harian_mingguan"=>$id_harian,
		"id_lap_perencanaan"=>$id_perencanaan,
			"id_paket"=>$id_paket,
			"tahun"=>$tahun1,
			"hari_tanggal"=>$id_harian
		);

//		Inputkan data
		$this->db->insert("lap_harian_mingguan",$data);
//		var_dump($data);
	}


	public function baru_pekerjaan()
	{

		$id_perencanaan=$this->input->post("id_perencanaan");
		$id_paket=$this->input->post("id_paket");
		$id_harian=$this->input->post("id_harian");

//		Select tahun dulu
		$tahun=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
		$count=count($tahun);
		$i=0;


		$tahun1=0;
		while($i<$count)
		{

			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

		$id_upah=$this->input->post("id_upah");
		$hari=$this->input->post("hari");
		$jenis_pekerjaan=$this->input->post("jenis_pekerjaan");
		$total=$this->input->post("total");


		$data=array(
              "id_lap_harian_mingguan"=>$id_harian,
			"id_lap_perencanaan"=>$id_perencanaan,
			"id_paket"=>$id_paket,
			"tahun"=>$tahun1,
			"id_jenis_upah"=>$id_upah,
			"hari"=>$hari,
			"jenis_pekerjaan"=>$jenis_pekerjaan,
			"total"=>$total
		);

//		var_dump($data);

		$this->db->insert("detail_bahan_alat_harian",$data);

	}



	public function baru_alat()
	{

		$id_perencanaan=$this->input->post("id_perencanaan");
		$id_paket=$this->input->post("id_paket");
		$id_harian=$this->input->post("id_harian");

//		Select tahun dulu
		$tahun=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
		$count=count($tahun);
		$i=0;


		$tahun1=0;
		while($i<$count)
		{

			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

		$id_satuan=$this->input->post("id_satuan");
		$hari=$this->input->post("hari");
		$jenis_bahan_alat=$this->input->post("jenis_bahan_alat");
		$total=$this->input->post("total");


		$data=array(
			"id_lap_harian_mingguan"=>$id_harian,
			"id_lap_perencanaan"=>$id_perencanaan,
			"id_paket"=>$id_paket,
			"tahun"=>$tahun1,
			"id_jenis_bahan_alat"=>$jenis_bahan_alat,
			"hari"=>$hari,
			"id_satuan"=>$id_satuan,
			"jumlah"=>$total
		);

//		var_dump($data);

		$this->db->insert("detail_alat_harian",$data);

	}


	public function list_pekerjaan()
	{
      $id_perencanaan=$this->input->post("id_perencanaan");

      $data=$this->db->query("SELECT * FROM detail_jenis_pekerjaan INNER JOIN jenis_pekerjaan ON detail_jenis_pekerjaan.id=jenis_pekerjaan.id WHERE id_lap_perencanaan='$id_perencanaan' GROUP BY detail_jenis_pekerjaan.id")->result();
      echo json_encode($data);

	}


	public function save_pengawasan_baru()
	{
      $id_perencanaan=$this->input->post("id_perencanaan");
      $id_paket=$this->input->post("id_paket");
      $tanggal=$this->input->post("tanggal");
      $minggu=$this->input->post("minggu");

//      Select tahun
		$tahun=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$id_perencanaan))->result();
		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Input ke database sekarang
		$data=array(
		"id_lap_pengawasan"=>$tanggal,
		"id_lap_perencanaan"=>$id_perencanaan,
			"id_paket"=>$id_paket,
			"tahun"=>$tahun1,
			"minggu"=>$minggu
		);

		$this->db->insert("lap_pengawasan",$data);
	}


	public function pengawasan_detail_baru()
	{
		$id_perencanaan=$this->input->post("id_perencanaan");
		$id_paket=$this->input->post("id_paket");
		$tanggal=$this->input->post("tanggal");
		$minggu=$this->input->post("minggu");
		$jenis_pekerja=$this->input->post("jenis_pekerja");
		$jenis_pekerjaan=$this->input->post("jenis_pekerjaan");
		$jumlah=$this->input->post("jumlah");

//		Cari id terlebih dahulu
		$max=0;
		$max_id=$this->db->query("SELECT MAX(id) as max FROM detail_laporan_pengawasan")->result();
		$count=count($max_id);
		$i=0;
		while($i<$count)
		{
			$max=$max_id[$i]->max;

			$i++;
		}

		$max++;

		$data=array(
			"id"=>$max,
			"id_lap_pengawasan"=>$tanggal,
			"id_lap_perencanaan"=>$id_perencanaan,
			"minggu"=>$minggu,
			"jenis_pekerjaan"=>$jenis_pekerjaan,
			"jenis_pekerja"=>$jenis_pekerja,
			"jumlah"=>$jumlah

		);

		$this->db->insert("detail_laporan_pengawasan",$data);
//		var_dump($data);

	}






}
