<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lap_perencanaan_force extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lap_perencanaan_force_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lap_perencanaan_force/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'lap_perencanaan_force/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'lap_perencanaan_force/index.html';
            $config['first_url'] = base_url() . 'lap_perencanaan_force/index.html';
        }

        $config['per_page'] = 1000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Lap_perencanaan_force_model->total_rows($q);
        $lap_perencanaan_force = $this->Lap_perencanaan_force_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lap_perencanaan_force_data' => $lap_perencanaan_force,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('lap_perencanaan_force/lap_perencanaan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Lap_perencanaan_force_model->get_by_id($id);
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
            $this->load->view('lap_perencanaan_force/lap_perencanaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_perencanaan_force'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lap_perencanaan_force/create_action'),
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
        $this->load->view('lap_perencanaan_force/lap_perencanaan_form', $data);
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

            $this->Lap_perencanaan_force_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lap_perencanaan_force'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lap_perencanaan_force_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lap_perencanaan_force/update_action'),
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
            $this->load->view('lap_perencanaan_force/lap_perencanaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_perencanaan_force'));
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

            $this->Lap_perencanaan_force_model->update($this->input->post('id_lap_perencanaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lap_perencanaan_force'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lap_perencanaan_force_model->get_by_id($id);

        if ($row) {
            $this->Lap_perencanaan_force_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lap_perencanaan_force'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_perencanaan_force'));
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

/* End of file Lap_perencanaan_force.php */
/* Location: ./application/controllers/Lap_perencanaan_force.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-25 04:28:25 */
/* http://harviacode.com */
