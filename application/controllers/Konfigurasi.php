<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konfigurasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'konfigurasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'konfigurasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'konfigurasi/index.html';
            $config['first_url'] = base_url() . 'konfigurasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Konfigurasi_model->total_rows($q);
        $konfigurasi = $this->Konfigurasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'konfigurasi_data' => $konfigurasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/konfigurasi/konfigurasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Konfigurasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_konfigurasi' => $row->id_konfigurasi,
		'nama' => $row->nama,
		'nip' => $row->nip,
	    );
            $this->load->view('admin/konfigurasi/konfigurasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konfigurasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('konfigurasi/create_action'),
	    'id_konfigurasi' => set_value('id_konfigurasi'),
	    'nama' => set_value('nama'),
	    'nip' => set_value('nip'),
	);
        $this->load->view('admin/konfigurasi/konfigurasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
//        	MAX
			$max=$this->db->query("SELECT MAX(CAST(id_konfigurasi AS INT)) as max FROM konfigurasi")->result();
			$max=$max[0]->max+1;
            $data = array(
            	'id_konfigurasi'=>$max,
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
	    );

            $this->Konfigurasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('konfigurasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Konfigurasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('konfigurasi/update_action'),
		'id_konfigurasi' => set_value('id_konfigurasi', $row->id_konfigurasi),
		'nama' => set_value('nama', $row->nama),
		'nip' => set_value('nip', $row->nip),
	    );
            $this->load->view('admin/konfigurasi/konfigurasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konfigurasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_konfigurasi', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
	    );

            $this->Konfigurasi_model->update($this->input->post('id_konfigurasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('konfigurasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Konfigurasi_model->get_by_id($id);

        if ($row) {
            $this->Konfigurasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('konfigurasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konfigurasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required|numeric');

	$this->form_validation->set_rules('id_konfigurasi', 'id_konfigurasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/Konfigurasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:11 */
/* http://harviacode.com */
