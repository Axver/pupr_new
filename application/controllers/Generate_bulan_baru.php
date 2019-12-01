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


          $data=$this->db->query("SELECT * FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = $tahun AND MONTH(id_lap_harian_mingguan)=$bulan AND id_lap_perencanaan='$id_perencanaan' AND id_paket='$id_paket' GROUP BY id_jenis_upah,jenis_pekerjaan")->result();

          echo json_encode($data);
    }

	
}
