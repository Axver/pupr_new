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


}
