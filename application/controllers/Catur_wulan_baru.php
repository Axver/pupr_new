<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catur_wulan_baru extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));

	}

    public function index()
    {
        $this->load->view("user/generate_catur_baru");
    }


    public function sketsa()
    {

        $id_paket=$this->input->post("id_paket");
        $id_perencanaan=$this->input->post("id_perencanaan");
        $bulan=$this->input->post("bulan");

        $this->db->select('*');    
$this->db->from('gambar_tahap');
$this->db->join('jenis_pekerjaan', 'gambar_tahap.jenis_pekerjaan = jenis_pekerjaan.id');
$this->db->where("id_paket",$id_paket);
$this->db->where("id_perencanaan",$id_perencanaan);
$this->db->where("bulan_start",$bulan);


        $data=$this->db->get()->result();

        echo json_encode($data);
    }

}