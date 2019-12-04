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


        $data=$this->db->get_where("gambar_tahap",array("id_paket"=>$id_paket,"id_perencanaan"=>$id_perencanaan,"bulan_start"=>$bulan))->result();

        echo json_encode($data);
    }

}