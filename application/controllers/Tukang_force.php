<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukang_force extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tukang_force_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tukang_force/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tukang_force/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tukang_force/index.html';
            $config['first_url'] = base_url() . 'tukang_force/index.html';
        }

        $config['per_page'] = 1000000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tukang_force_model->total_rows($q);
        $tukang_force = $this->Tukang_force_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tukang_force_data' => $tukang_force,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tukang_force/detail_bahan_alat_harian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tukang_force_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lap_harian_mingguan' => $row->id_lap_harian_mingguan,
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'id_jenis_bahan_alat' => $row->id_jenis_bahan_alat,
		'id_satuan' => $row->id_satuan,
		'jumlah_bahan' => $row->jumlah_bahan,
		'jenis_pekerja' => $row->jenis_pekerja,
		'jumlah_pekerja' => $row->jumlah_pekerja,
		'gambar' => $row->gambar,
		'jenis_pekerjaan' => $row->jenis_pekerjaan,
		'lokasi' => $row->lokasi,
		'panjang_penanganan' => $row->panjang_penanganan,
		'keterangan_dimensi' => $row->keterangan_dimensi,
		'jumlah_tukang' => $row->jumlah_tukang,
	    );
            $this->load->view('tukang_force/detail_bahan_alat_harian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tukang_force'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tukang_force/create_action'),
	    'id_lap_harian_mingguan' => set_value('id_lap_harian_mingguan'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat'),
	    'id_satuan' => set_value('id_satuan'),
	    'jumlah_bahan' => set_value('jumlah_bahan'),
	    'jenis_pekerja' => set_value('jenis_pekerja'),
	    'jumlah_pekerja' => set_value('jumlah_pekerja'),
	    'gambar' => set_value('gambar'),
	    'jenis_pekerjaan' => set_value('jenis_pekerjaan'),
	    'lokasi' => set_value('lokasi'),
	    'panjang_penanganan' => set_value('panjang_penanganan'),
	    'keterangan_dimensi' => set_value('keterangan_dimensi'),
	    'jumlah_tukang' => set_value('jumlah_tukang'),
	);
        $this->load->view('tukang_force/detail_bahan_alat_harian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'jumlah_bahan' => $this->input->post('jumlah_bahan',TRUE),
		'jumlah_pekerja' => $this->input->post('jumlah_pekerja',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'panjang_penanganan' => $this->input->post('panjang_penanganan',TRUE),
		'keterangan_dimensi' => $this->input->post('keterangan_dimensi',TRUE),
		'jumlah_tukang' => $this->input->post('jumlah_tukang',TRUE),
	    );

            $this->Tukang_force_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tukang_force'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tukang_force_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tukang_force/update_action'),
		'id_lap_harian_mingguan' => set_value('id_lap_harian_mingguan', $row->id_lap_harian_mingguan),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat', $row->id_jenis_bahan_alat),
		'id_satuan' => set_value('id_satuan', $row->id_satuan),
		'jumlah_bahan' => set_value('jumlah_bahan', $row->jumlah_bahan),
		'jenis_pekerja' => set_value('jenis_pekerja', $row->jenis_pekerja),
		'jumlah_pekerja' => set_value('jumlah_pekerja', $row->jumlah_pekerja),
		'gambar' => set_value('gambar', $row->gambar),
		'jenis_pekerjaan' => set_value('jenis_pekerjaan', $row->jenis_pekerjaan),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'panjang_penanganan' => set_value('panjang_penanganan', $row->panjang_penanganan),
		'keterangan_dimensi' => set_value('keterangan_dimensi', $row->keterangan_dimensi),
		'jumlah_tukang' => set_value('jumlah_tukang', $row->jumlah_tukang),
	    );
            $this->load->view('tukang_force/detail_bahan_alat_harian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tukang_force'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lap_harian_mingguan', TRUE));
        } else {
            $data = array(
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'jumlah_bahan' => $this->input->post('jumlah_bahan',TRUE),
		'jumlah_pekerja' => $this->input->post('jumlah_pekerja',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'panjang_penanganan' => $this->input->post('panjang_penanganan',TRUE),
		'keterangan_dimensi' => $this->input->post('keterangan_dimensi',TRUE),
		'jumlah_tukang' => $this->input->post('jumlah_tukang',TRUE),
	    );

            $this->Tukang_force_model->update($this->input->post('id_lap_harian_mingguan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tukang_force'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tukang_force_model->get_by_id($id);

        if ($row) {
            $this->Tukang_force_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tukang_force'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tukang_force'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_satuan', 'id satuan', 'trim|required');
	$this->form_validation->set_rules('jumlah_bahan', 'jumlah bahan', 'trim|required');
	$this->form_validation->set_rules('jumlah_pekerja', 'jumlah pekerja', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('jenis_pekerjaan', 'jenis pekerjaan', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('panjang_penanganan', 'panjang penanganan', 'trim|required');
	$this->form_validation->set_rules('keterangan_dimensi', 'keterangan dimensi', 'trim|required');
	$this->form_validation->set_rules('jumlah_tukang', 'jumlah tukang', 'trim|required');

	$this->form_validation->set_rules('id_lap_harian_mingguan', 'id_lap_harian_mingguan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tukang_force.php */
/* Location: ./application/controllers/Tukang_force.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-25 05:11:03 */
/* http://harviacode.com */
