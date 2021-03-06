<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_bulan extends CI_Controller {

	public function index()
	{

		$this->load->view("user/generate_bulan");
	}

	public function laporan_perencanaan()
	{
		$id_paket=$this->input->post("id_paket");
//		Select Laporan perencanaan dengan id paket yang sama
		$hasil=$this->db->get_where("lap_perencanaan",array("id_paket"=>$id_paket))->result();

		echo json_encode($hasil);
	}

	public function jenis_pekerjaan()
	{
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
//		Select Distint data dari database
		$this->db->select('*');
		$this->db->distinct('id_jenis_bahan_alat');
		$this->db->from('detail_bahan_alat_harian');
		$this->db->join('jenis_pekerjaan', 'detail_bahan_alat_harian.jenis_pekerja = jenis_pekerjaan.id');

		$data=$this->db->get()->result();
		echo json_encode($data);
	}

	public function between_date()
	{
		$start=$this->input->post('start');
		$end=$this->input->post("end");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");

		$start=strtotime($start);
		$end=strtotime($end);
		$start = date('Y-m-d',$start);
		$end = date('Y-m-d',$end);

//		Select Beetween
		$data=$this->db->query("SELECT * FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan>='$start' AND id_lap_harian_mingguan<='$end' AND id_lap_perencanaan='$id_lap_perencanaan'")->result();
		echo json_encode($data);
	}


	public function pekerjaan_tanggal()
	{
		$tanggal=$this->input->post("tanggal");
		$id_lap_perencanaan=$this->input->post("id_lap_perencanaan");
//		echo $tanggal;

		$tanggal=explode('/',$tanggal);

		$strTangga=$tanggal[2]."/".$tanggal[1]."/".$tanggal[0];
		$strTangga=strtotime($strTangga);
		$strTangga = date('Y-m-d',$strTangga);
//		echo $strTangga;

//		Select data dari database
		$data=$this->db->query("SELECT * FROM detail_bahan_alat_harian WHERE MONTH(id_lap_harian_mingguan)=MONTH('$strTangga') AND id_lap_perencanaan='$id_lap_perencanaan'")->result();
		echo json_encode($data);
//		echo "SELECT * FROM detail_bahan_alat_harian WHERE id_lap_harian_mingguan='$tanggal'";

	}

//	Dapatkan data pada generate tabel

public function data()
{
	$tahun=$this->input->post("tahun");
	$bulan=$this->input->post("bulan");
	$id_perencanaan=$this->input->post("id_perencanaan");

//	Select Disini
	$data=$this->db->query("SELECT *,SUM(jumlah_pekerja) as count FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerja=jenis_pekerjaan.id INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY jenis_pekerja");
	$data=$data->result();

	echo json_encode($data);
//echo "SELECT *,COUNT(jumlah_pekerja) FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY jenis_pekerja";
}


	public function data_alat()
	{
		$tahun=$this->input->post("tahun");
		$bulan=$this->input->post("bulan");
		$id_perencanaan=$this->input->post("id_perencanaan");

//	Select Disini
		$data=$this->db->query("SELECT *,SUM(jumlah_bahan) as count FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerja=jenis_pekerjaan.id INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY id_jenis_bahan_alat");
		$data=$data->result();

		echo json_encode($data);
//echo "SELECT *,COUNT(jumlah_pekerja) FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY jenis_pekerja";
	}


	public function isi_data()
	{
		$tahun=$this->input->post("tahun");
		$bulan=$this->input->post("bulan");
		$id_perencanaan=$this->input->post("id_perencanaan");

//	Select Disini
		$data=$this->db->query("SELECT *,SUM(jumlah_pekerja) as count FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY id_lap_harian_mingguan");
		$data=$data->result();

		echo json_encode($data);
//echo "SELECT *,COUNT(jumlah_pekerja) FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY jenis_pekerja";
	}

	public function isi_data1()
	{
		$tahun=$this->input->post("tahun");
		$bulan=$this->input->post("bulan");
		$id_perencanaan=$this->input->post("id_perencanaan");

//	Select Disini
		$data=$this->db->query("SELECT *,SUM(jumlah_bahan) as count FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY id_lap_harian_mingguan");
		$data=$data->result();

		echo json_encode($data);
//echo "SELECT *,COUNT(jumlah_pekerja) FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan) = $bulan AND id_lap_perencanaan='$id_perencanaan' GROUP BY jenis_pekerja";
	}

	public function progres1()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT SUM(jumlah_pekerja )as count FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) = '$bulan' AND id_lap_perencanaan='$perencanaan'")->result();
		echo json_encode($data);
	}

	public function progres11()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");
		$akhir=$bulan+3;

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT SUM(jumlah_pekerja )as count FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) >= '$bulan' AND MONTH(id_lap_harian_mingguan) <= '$akhir' AND id_lap_perencanaan='$perencanaan'")->result();
		echo json_encode($data);
	}

	public function progres111()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");
		$bulan=$bulan-4;
		$akhir=$bulan+3;

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT SUM(jumlah_pekerja )as count FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) >= '$bulan' AND MONTH(id_lap_harian_mingguan) <= '$akhir' AND id_lap_perencanaan='$perencanaan'")->result();
		echo json_encode($data);
	}

	public function progres2()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT SUM(jumlah_tukang )as count FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) = '$bulan' AND id_lap_perencanaan='$perencanaan'")->result();
		echo json_encode($data);
	}

	public function progres22()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");
		$akhir=$bulan+3;

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT SUM(jumlah_tukang )as count FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) >= '$bulan' AND MONTH(id_lap_harian_mingguan) <= '$akhir' AND id_lap_perencanaan='$perencanaan'")->result();
		echo json_encode($data);
	}

	public function progres222()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");
		$bulan=$bulan-4;
		$akhir=$bulan+3;

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT SUM(jumlah_tukang )as count FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) >= '$bulan' AND MONTH(id_lap_harian_mingguan) <= '$akhir' AND id_lap_perencanaan='$perencanaan'")->result();
		echo json_encode($data);
	}

	public function progres3()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT *,SUM(jumlah_bahan )as count FROM detail_bahan_alat_harian INNER JOIN jenis_bahan_alat ON detail_bahan_alat_harian.id_jenis_bahan_alat=jenis_bahan_alat.id_jenis_bahan_alat WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) = '$bulan' AND id_lap_perencanaan='$perencanaan' GROUP BY detail_bahan_alat_harian.id_jenis_bahan_alat")->result();
		echo json_encode($data);
	}

	public function progres33()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");

		$akhir=$bulan+3;

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT *,SUM(jumlah_bahan )as count FROM detail_bahan_alat_harian INNER JOIN jenis_bahan_alat ON detail_bahan_alat_harian.id_jenis_bahan_alat=jenis_bahan_alat.id_jenis_bahan_alat WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) >= '$bulan' AND MONTH(id_lap_harian_mingguan) <= '$akhir' AND id_lap_perencanaan='$perencanaan' GROUP BY detail_bahan_alat_harian.id_jenis_bahan_alat")->result();
		echo json_encode($data);
	}

	public function progres333()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");

		$bulan=$this->input->post("bulan");
		$bulan=$bulan-4;

		$akhir=$bulan+3;

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->query("SELECT *,SUM(jumlah_bahan )as count FROM detail_bahan_alat_harian INNER JOIN jenis_bahan_alat ON detail_bahan_alat_harian.id_jenis_bahan_alat=jenis_bahan_alat.id_jenis_bahan_alat WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) >= '$bulan' AND MONTH(id_lap_harian_mingguan) <= '$akhir' AND id_lap_perencanaan='$perencanaan' GROUP BY detail_bahan_alat_harian.id_jenis_bahan_alat")->result();
		echo json_encode($data);
	}

	public function progres4()
	{
		$id_paket=$this->input->post("id_paket");
		$perencanaan=$this->input->post("perencanaan");
		$bulan=$this->input->post("bulan");

//		Dapatkan tahun terlebih dahulu
		$tahun=$this->db->get_where("paket")->result();

		$count=count($tahun);
		$i=0;

		while($i<$count)
		{
			$tahun1=$tahun[$i]->tahun;

			$i++;
		}

//		Tahun 1 dapat

//		Selectd ari database

		$data=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();
//		$data=$this->db->query("SELECT *,SUM(jumlah_bahan )as count FROM detail_bahan_alat_harian INNER JOIN jenis_bahan_alat ON detail_bahan_alat_harian.id_jenis_bahan_alat=jenis_bahan_alat.id_jenis_bahan_alat WHERE YEAR(id_lap_harian_mingguan) = $tahun1 AND MONTH(id_lap_harian_mingguan) = '$bulan' AND id_lap_perencanaan='$perencanaan' GROUP BY detail_bahan_alat_harian.id_jenis_bahan_alat")->result();
		echo json_encode($data);
	}

}
