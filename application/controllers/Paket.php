<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'paket/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'paket/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'paket/index.html';
            $config['first_url'] = base_url() . 'paket/index.html';
        }

        $config['per_page'] = 1000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Paket_model->total_rows($q);
        $paket = $this->Paket_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'paket_data' => $paket,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/paket/paket_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paket_model->get_by_id($id);
        $detil=$this->db->get_where("detail_paket",array("id_paket",$id))->result();
        if ($row) {
            $data = array(
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'nama' => $row->nama,
				'detil'=>$detil,
	    );
            $this->load->view('admin/paket/paket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
//            redirect(site_url('paket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paket/create_action'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'nama' => set_value('nama'),
	);
        $this->load->view('admin/paket/paket_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			$postData = $this->input->post();

//			Id Paket
			$max=$this->db->query("SELECT MAX(CAST(id_paket AS INT)) as max FROM paket")->result();
			$max=$max[0]->max+1;


			$data= array(
				'id_paket'=>$max,
				'tahun'=>$postData['tahun'],
				'nama'=>$postData['nama']
			);

            $this->Paket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paket'));

        }
    }
    
    public function update($id) 
    {
        $row = $this->Paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paket/update_action'),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'nama' => set_value('nama', $row->nama),
	    );
            $this->load->view('admin/paket/paket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_paket', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Paket_model->update($this->input->post('id_paket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paket'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paket_model->get_by_id($id);

        if ($row) {
            $this->Paket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id_paket', 'id_paket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function save_paket()
	{
		$nip=$this->input->post("nip");
//		echo $nip;
		$paket=$this->input->post("id_paket");

//		Get Tahun
		$tahun=$this->db->get_where("paket",array("id_paket",$paket))->result();
//		var_dump($tahun[0]->tahun);
		$tahun_=$tahun[0]->tahun;

//		Input data
		$data=array(
		"id_paket"=>$paket,
		"tahun"=>$tahun_,
		"nip"=>$nip
		);

		var_dump($data);

//		Input data
		$this->db->insert("detail_paket",$data);
	}

}

/* End of file Paket.php */
/* Location: ./application/controllers/Paket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:12 */
/* http://harviacode.com */
