<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konfigurasi_baru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konfigurasi_baru_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'konfigurasi_baru/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'konfigurasi_baru/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'konfigurasi_baru/index.html';
            $config['first_url'] = base_url() . 'konfigurasi_baru/index.html';
        }

        $config['per_page'] = 1000000000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Konfigurasi_baru_model->total_rows($q);
        $konfigurasi_baru = $this->Konfigurasi_baru_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'konfigurasi_baru_data' => $konfigurasi_baru,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('konfigurasi_baru/konfigurasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Konfigurasi_baru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_konfigurasi' => $row->id_konfigurasi,
		'nama' => $row->nama,
		'nip' => $row->nip,
		'jabatan' => $row->jabatan,
	    );
            $this->load->view('konfigurasi_baru/konfigurasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konfigurasi_baru'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('konfigurasi_baru/create_action'),
	    'id_konfigurasi' => set_value('id_konfigurasi'),
	    'nama' => set_value('nama'),
	    'nip' => set_value('nip'),
	    'jabatan' => set_value('jabatan'),
	);
        $this->load->view('konfigurasi_baru/konfigurasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $id=$this->db->query("SELECT MAX(CAST(id_konfigurasi AS int)) as max FROM konfigurasi")->result();
            $count=count($id);
            $id_max=0;

            $i=0;

            while($i<$count)
            {
                 $id_max=$id[$i]->max;

                $i++;
            }

            $id_max=$id_max+1;
            $data = array(
                'id_konfigurasi'=>$id_max,
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Konfigurasi_baru_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('konfigurasi_baru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Konfigurasi_baru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('konfigurasi_baru/update_action'),
		'id_konfigurasi' => set_value('id_konfigurasi', $row->id_konfigurasi),
		'nama' => set_value('nama', $row->nama),
		'nip' => set_value('nip', $row->nip),
		'jabatan' => set_value('jabatan', $row->jabatan),
	    );
            $this->load->view('konfigurasi_baru/konfigurasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konfigurasi_baru'));
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
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Konfigurasi_baru_model->update($this->input->post('id_konfigurasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('konfigurasi_baru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Konfigurasi_baru_model->get_by_id($id);

        if ($row) {
            $this->Konfigurasi_baru_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('konfigurasi_baru'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konfigurasi_baru'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('id_konfigurasi', 'id_konfigurasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Konfigurasi_baru.php */
/* Location: ./application/controllers/Konfigurasi_baru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-09 05:58:12 */
/* http://harviacode.com */