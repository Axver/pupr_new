<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ttd_info extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ttd_info_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ttd_info/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ttd_info/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ttd_info/index.html';
            $config['first_url'] = base_url() . 'ttd_info/index.html';
        }

        $config['per_page'] = 1000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ttd_info_model->total_rows($q);
        $ttd_info = $this->Ttd_info_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ttd_info_data' => $ttd_info,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('ttd_info/konfigurasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ttd_info_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_konfigurasi' => $row->id_konfigurasi,
		'nama' => $row->nama,
		'nip' => $row->nip,
		'jabatan' => $row->jabatan,
	    );
            $this->load->view('ttd_info/konfigurasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ttd_info'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ttd_info/create_action'),
	    'id_konfigurasi' => set_value('id_konfigurasi'),
	    'nama' => set_value('nama'),
	    'nip' => set_value('nip'),
	    'jabatan' => set_value('jabatan'),
	);
        $this->load->view('ttd_info/konfigurasi_form', $data);
    }
    
    public function create_action() 
    {

        	$id=$this->db->query("SELECT MAX(CAST(id_konfigurasi AS INT))as max FROM konfigurasi")->result();
        	$max=0;
        	$count=count($id);
        	$i=0;
        	while($i<$count)
			{
				$max=$id[$i]->max;
				$i++;
			}
			$max=$max+1;
            $data = array(
				'id_konfigurasi' => $max,
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Ttd_info_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ttd_info'));

    }
    
    public function update($id) 
    {
        $row = $this->Ttd_info_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ttd_info/update_action'),
		'id_konfigurasi' => set_value('id_konfigurasi', $row->id_konfigurasi),
		'nama' => set_value('nama', $row->nama),
		'nip' => set_value('nip', $row->nip),
		'jabatan' => set_value('jabatan', $row->jabatan),
	    );
            $this->load->view('ttd_info/konfigurasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ttd_info'));
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

            $this->Ttd_info_model->update($this->input->post('id_konfigurasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ttd_info'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ttd_info_model->get_by_id($id);

        if ($row) {
            $this->Ttd_info_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ttd_info'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ttd_info'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required|numeric');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('id_konfigurasi', 'id_konfigurasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ttd_info.php */
/* Location: ./application/controllers/Ttd_info.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-23 09:14:23 */
/* http://harviacode.com */
