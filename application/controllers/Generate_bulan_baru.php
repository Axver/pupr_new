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

	
}
