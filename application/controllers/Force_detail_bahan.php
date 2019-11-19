<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Force_detail_bahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Force_detail_bahan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'force_detail_bahan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'force_detail_bahan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'force_detail_bahan/index.html';
            $config['first_url'] = base_url() . 'force_detail_bahan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Force_detail_bahan_model->total_rows($q);
        $force_detail_bahan = $this->Force_detail_bahan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'force_detail_bahan_data' => $force_detail_bahan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('force_detail_bahan/detail_bahan_alat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Force_detail_bahan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'id_detail_bahan_alat' => $row->id_detail_bahan_alat,
		'id_jenis_bahan_alat' => $row->id_jenis_bahan_alat,
		'id_satuan' => $row->id_satuan,
		'jumlah' => $row->jumlah,
		'tanggal' => $row->tanggal,
		'minggu' => $row->minggu,
	    );
            $this->load->view('force_detail_bahan/detail_bahan_alat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('force_detail_bahan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('force_detail_bahan/create_action'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'id_detail_bahan_alat' => set_value('id_detail_bahan_alat'),
	    'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat'),
	    'id_satuan' => set_value('id_satuan'),
	    'jumlah' => set_value('jumlah'),
	    'tanggal' => set_value('tanggal'),
	    'minggu' => set_value('minggu'),
	);
        $this->load->view('force_detail_bahan/detail_bahan_alat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenis_bahan_alat' => $this->input->post('id_jenis_bahan_alat',TRUE),
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Force_detail_bahan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('force_detail_bahan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Force_detail_bahan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('force_detail_bahan/update_action'),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'id_detail_bahan_alat' => set_value('id_detail_bahan_alat', $row->id_detail_bahan_alat),
		'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat', $row->id_jenis_bahan_alat),
		'id_satuan' => set_value('id_satuan', $row->id_satuan),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'minggu' => set_value('minggu', $row->minggu),
	    );
            $this->load->view('force_detail_bahan/detail_bahan_alat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('force_detail_bahan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lap_perencanaan', TRUE));
        } else {
            $data = array(
		'id_jenis_bahan_alat' => $this->input->post('id_jenis_bahan_alat',TRUE),
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Force_detail_bahan_model->update($this->input->post('id_lap_perencanaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('force_detail_bahan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Force_detail_bahan_model->get_by_id($id);

        if ($row) {
            $this->Force_detail_bahan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('force_detail_bahan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('force_detail_bahan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenis_bahan_alat', 'id jenis bahan alat', 'trim|required');
	$this->form_validation->set_rules('id_satuan', 'id satuan', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required|numeric');

	$this->form_validation->set_rules('id_lap_perencanaan', 'id_lap_perencanaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Force_detail_bahan.php */
/* Location: ./application/controllers/Force_detail_bahan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-19 06:29:35 */
/* http://harviacode.com */