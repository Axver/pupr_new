<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_bulan_baru extends CI_Controller {

	public function index()
	{

        $this->load->view("user/generate_bulan_baru");

    }
    

    public function perencanaan()
    {
        
        $id_paket=$this->input->post("id_paket");
        // Select sekarang
        $data=$this->db->get_where("lap_perencanaan",array("id_paket"=>$id_paket))->result();

        echo json_encode($data);
    }

    public function row()
    {
          $id_paket=$this->input->post("id_paket");
          $id_perencanaan=$this->input->post("id_perencanaan");
          $bulan=$this->input->post("bulan");
          $tahun=$this->input->post("tahun");


          $data=$this->db->query("SELECT * FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerjaan=jenis_pekerjaan.id INNER JOIN jenis_upah ON detail_bahan_alat_harian.id_jenis_upah=jenis_upah.id_jenis_upah WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan)=$bulan AND id_lap_perencanaan='$id_perencanaan' AND id_paket='$id_paket' GROUP BY detail_bahan_alat_harian.id_jenis_upah,detail_bahan_alat_harian.jenis_pekerjaan")->result();

          echo json_encode($data);
    }


    public function minggu()
    {
          $id_paket=$this->input->post("id_paket");
          $id_perencanaan=$this->input->post("id_perencanaan");
          $bulan=$this->input->post("bulan");
          $tahun=$this->input->post("tahun");
          $minggu=$this->input->post("minggu");


          $data=$this->db->query("
          SELECT *,SUM(total) as sum FROM detail_bahan_alat_harian WHERE id_lap_perencanaan='$id_perencanaan' 
          AND id_paket='$id_paket' AND WEEK(id_lap_harian_mingguan) - WEEK(id_lap_harian_mingguan)+1=$minggu
          AND tahun='$tahun' 
          AND  MONTH(id_lap_harian_mingguan)='$bulan' GROUP BY jenis_pekerjaan,id_jenis_upah
          ")->result();

          echo json_encode($data);
    }


    public function alat_minggu()
    {
          $id_paket=$this->input->post("id_paket");
          $id_perencanaan=$this->input->post("id_perencanaan");
          $bulan=$this->input->post("bulan");
          $tahun=$this->input->post("tahun");
          $minggu=$this->input->post("minggu");


          $data=$this->db->query("
          SELECT *,SUM(jumlah) as sum FROM detail_alat_harian WHERE id_lap_perencanaan='$id_perencanaan' 
          AND id_paket='$id_paket' AND WEEK(id_lap_harian_mingguan) - WEEK(id_lap_harian_mingguan)+1=$minggu
          AND tahun='$tahun' 
          AND  MONTH(id_lap_harian_mingguan)='$bulan' GROUP BY id_jenis_bahan_alat
          ")->result();

          echo json_encode($data);
    }

    public function generate_alat()
    {
          $id_paket=$this->input->post("id_paket");
          $id_perencanaan=$this->input->post("id_perencanaan");
          $bulan=$this->input->post("bulan");
          $tahun=$this->input->post("tahun");
        


          $data=$this->db->query("
          SELECT *,SUM(jumlah) as sum FROM detail_alat_harian
          INNER JOIN jenis_bahan_alat ON detail_alat_harian.id_jenis_bahan_alat=jenis_bahan_alat.id_jenis_bahan_alat
          INNER JOIN satuan ON detail_alat_harian.id_satuan=satuan.id_satuan
          WHERE id_lap_perencanaan='$id_perencanaan' 
          AND id_paket='$id_paket'
          AND tahun='$tahun' 
          AND  MONTH(id_lap_harian_mingguan)='$bulan' GROUP BY detail_alat_harian.id_jenis_bahan_alat
          ")->result();

          echo json_encode($data);
    }

    public function row1()
    {
          $id_paket=$this->input->post("id_paket");
          $id_perencanaan=$this->input->post("id_perencanaan");
          $bulan=$this->input->post("bulan");
          $tahun=$this->input->post("tahun");
          $bulan_akhir=$bulan+3;


          $data=$this->db->query("SELECT * FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerjaan=jenis_pekerjaan.id INNER JOIN jenis_upah ON detail_bahan_alat_harian.id_jenis_upah=jenis_upah.id_jenis_upah WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan)>=$bulan AND MONTH(id_lap_harian_mingguan)<=$bulan_akhir  AND id_lap_perencanaan='$id_perencanaan' AND id_paket='$id_paket' GROUP BY detail_bahan_alat_harian.id_jenis_upah,detail_bahan_alat_harian.jenis_pekerjaan")->result();

          echo json_encode($data);
    }

    public function generate_alat1()
    {
          $id_paket=$this->input->post("id_paket");
          $id_perencanaan=$this->input->post("id_perencanaan");
          $bulan=$this->input->post("bulan");
          $tahun=$this->input->post("tahun");
          $bulan_akhir=$bulan+3;
        


          $data=$this->db->query("
          SELECT *,SUM(jumlah) as sum FROM detail_alat_harian
          INNER JOIN jenis_bahan_alat ON detail_alat_harian.id_jenis_bahan_alat=jenis_bahan_alat.id_jenis_bahan_alat
          INNER JOIN satuan ON detail_alat_harian.id_satuan=satuan.id_satuan
          WHERE id_lap_perencanaan='$id_perencanaan' 
          AND id_paket='$id_paket'
          AND tahun='$tahun' 
          AND  MONTH(id_lap_harian_mingguan)>='$bulan' 
          AND  MONTH(id_lap_harian_mingguan)<='$bulan_akhir' 
          GROUP BY detail_alat_harian.id_jenis_bahan_alat
          ")->result();

          echo json_encode($data);
    }

	
}
