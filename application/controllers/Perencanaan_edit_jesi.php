<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perencanaan_edit_jesi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perencanaan_edit_jesi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'perencanaan_edit_jesi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'perencanaan_edit_jesi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'perencanaan_edit_jesi/index.html';
            $config['first_url'] = base_url() . 'perencanaan_edit_jesi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Perencanaan_edit_jesi_model->total_rows($q);
        $perencanaan_edit_jesi = $this->Perencanaan_edit_jesi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'perencanaan_edit_jesi_data' => $perencanaan_edit_jesi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('perencanaan_edit_jesi/lap_perencanaan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Perencanaan_edit_jesi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'tukang' => $row->tukang,
		'pekerja' => $row->pekerja,
		'lokasi' => $row->lokasi,
		'jenis_pekerjaan' => $row->jenis_pekerjaan,
		'panjang_penanganan' => $row->panjang_penanganan,
		'keterangan_dimensi' => $row->keterangan_dimensi,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('perencanaan_edit_jesi/lap_perencanaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perencanaan_edit_jesi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perencanaan_edit_jesi/create_action'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'tukang' => set_value('tukang'),
	    'pekerja' => set_value('pekerja'),
	    'lokasi' => set_value('lokasi'),
	    'jenis_pekerjaan' => set_value('jenis_pekerjaan'),
	    'panjang_penanganan' => set_value('panjang_penanganan'),
	    'keterangan_dimensi' => set_value('keterangan_dimensi'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('perencanaan_edit_jesi/lap_perencanaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tukang' => $this->input->post('tukang',TRUE),
		'pekerja' => $this->input->post('pekerja',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan',TRUE),
		'panjang_penanganan' => $this->input->post('panjang_penanganan',TRUE),
		'keterangan_dimensi' => $this->input->post('keterangan_dimensi',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Perencanaan_edit_jesi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perencanaan_edit_jesi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perencanaan_edit_jesi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perencanaan_edit_jesi/update_action'),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'tukang' => set_value('tukang', $row->tukang),
		'pekerja' => set_value('pekerja', $row->pekerja),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'jenis_pekerjaan' => set_value('jenis_pekerjaan', $row->jenis_pekerjaan),
		'panjang_penanganan' => set_value('panjang_penanganan', $row->panjang_penanganan),
		'keterangan_dimensi' => set_value('keterangan_dimensi', $row->keterangan_dimensi),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('perencanaan_edit_jesi/lap_perencanaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perencanaan_edit_jesi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lap_perencanaan', TRUE));
        } else {
            $data = array(
		'tukang' => $this->input->post('tukang',TRUE),
		'pekerja' => $this->input->post('pekerja',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan',TRUE),
		'panjang_penanganan' => $this->input->post('panjang_penanganan',TRUE),
		'keterangan_dimensi' => $this->input->post('keterangan_dimensi',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Perencanaan_edit_jesi_model->update($this->input->post('id_lap_perencanaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perencanaan_edit_jesi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perencanaan_edit_jesi_model->get_by_id($id);

        if ($row) {
            $this->Perencanaan_edit_jesi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perencanaan_edit_jesi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perencanaan_edit_jesi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tukang', 'tukang', 'trim|required|numeric');
	$this->form_validation->set_rules('pekerja', 'pekerja', 'trim|required|numeric');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('jenis_pekerjaan', 'jenis pekerjaan', 'trim|required');
	$this->form_validation->set_rules('panjang_penanganan', 'panjang penanganan', 'trim|required');
	$this->form_validation->set_rules('keterangan_dimensi', 'keterangan dimensi', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_lap_perencanaan', 'id_lap_perencanaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Perencanaan_edit_jesi.php */
/* Location: ./application/controllers/Perencanaan_edit_jesi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-21 10:52:52 */
/* http://harviacode.com */