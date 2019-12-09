<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lampiran_tahap extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));

	}


	public function index()
	{
      $this->load->view("user/lampiran_tahap");
    }
    

    public function perencanaan()
    {
        $id_paket=$this->input->post("id_paket");

        $data=$this->db->get_where("lap_perencanaan",array("id_paket"=>$id_paket))->result();


        echo json_encode($data);
    }


    public function validasi()
    {

        $bulan_mulai=$this->input->post("bulan_mulai");
        $bulan_selesai=$this->input->post("bulan_selesai");
        $id_paket=$this->input->post("id_paket");
        $lap_perencanaan=$this->input->post("laporan_perencanaan");


        // Select semua jenis pekerjaan yang sesuai dengan data atas
        // select dari detail bahan alat harian


        // $data=$this->db->query("SELECT * FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerja=jenis_pekerjaan.id INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE  MONTH(id_lap_harian_mingguan) >= $bulan_mulai AND MONTH(id_lap_harian_mingguan) <= $bulan_selesai AND id_lap_perencanaan='$lap_perencanaan' GROUP BY id_jenis_bahan_alat");
        

        // echo "SELECT * FROM detail_bahan_alat_harian INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerjaan=jenis_pekerjaan.id INNER JOIN satuan ON detail_bahan_alat_harian.id_satuan=satuan.id_satuan WHERE  MONTH(id_lap_harian_mingguan) >= $bulan_mulai AND MONTH(id_lap_harian_mingguan) <= $bulan_selesai AND id_lap_perencanaan='$lap_perencanaan' GROUP BY id_jenis_bahan_alat";
      

        $data=$this->db->query("SELECT *,SUM(total) as sum FROM detail_bahan_alat_harian
        INNER JOIN jenis_pekerjaan ON detail_bahan_alat_harian.jenis_pekerjaan=jenis_pekerjaan.id
        WHERE id_lap_perencanaan='$lap_perencanaan' 
        AND id_paket='$id_paket'
       
        AND  MONTH(id_lap_harian_mingguan)>='$bulan_mulai' AND  MONTH(id_lap_harian_mingguan)<='$bulan_selesai' GROUP BY jenis_pekerjaan
        ")->result();

       echo json_encode($data);
    
    }



    public function cetak()
    {

        $this->load->view("user/cetak_lampiran_tahap");
    }


}
