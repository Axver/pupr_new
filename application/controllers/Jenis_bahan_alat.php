<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_bahan_alat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_bahan_alat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_bahan_alat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_bahan_alat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_bahan_alat/index.html';
            $config['first_url'] = base_url() . 'jenis_bahan_alat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_bahan_alat_model->total_rows($q);
        $jenis_bahan_alat = $this->Jenis_bahan_alat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_bahan_alat_data' => $jenis_bahan_alat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/jenis_bahan_alat/jenis_bahan_alat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_bahan_alat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_bahan_alat' => $row->id_jenis_bahan_alat,
		'jenis_bahan_alat' => $row->jenis_bahan_alat,
	    );
            $this->load->view('admin/jenis_bahan_alat/jenis_bahan_alat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_bahan_alat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_bahan_alat/create_action'),
	    'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat'),
	    'jenis_bahan_alat' => set_value('jenis_bahan_alat'),
	);
        $this->load->view('admin/jenis_bahan_alat/jenis_bahan_alat_form', $data);
    }
    
    public function create_action() 
    {
//    	Ambil Max
		$max=$this->db->query("SELECT MAX(CAST(id_jenis_bahan_alat AS INT) )as max FROM jenis_bahan_alat")->result();
		$max=$max[0]->max+1;
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'id_jenis_bahan_alat' => $max,
		'jenis_bahan_alat' => $this->input->post('jenis_bahan_alat',TRUE),
	    );

            $this->Jenis_bahan_alat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_bahan_alat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_bahan_alat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_bahan_alat/update_action'),
		'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat', $row->id_jenis_bahan_alat),
		'jenis_bahan_alat' => set_value('jenis_bahan_alat', $row->jenis_bahan_alat),
	    );
            $this->load->view('admin/jenis_bahan_alat/jenis_bahan_alat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_bahan_alat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_bahan_alat', TRUE));
        } else {
            $data = array(
		'jenis_bahan_alat' => $this->input->post('jenis_bahan_alat',TRUE),
	    );

            $this->Jenis_bahan_alat_model->update($this->input->post('id_jenis_bahan_alat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_bahan_alat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_bahan_alat_model->get_by_id($id);

        if ($row) {
            $this->Jenis_bahan_alat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_bahan_alat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_bahan_alat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_bahan_alat', 'jenis bahan alat', 'trim|required');

	$this->form_validation->set_rules('id_jenis_bahan_alat', 'id_jenis_bahan_alat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_bahan_alat.php */
/* Location: ./application/controllers/Jenis_bahan_alat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:11 */
/* http://harviacode.com */
