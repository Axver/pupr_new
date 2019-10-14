<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_bahan_alat_harian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_bahan_alat_harian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_bahan_alat_harian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_bahan_alat_harian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_bahan_alat_harian/index.html';
            $config['first_url'] = base_url() . 'detail_bahan_alat_harian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_bahan_alat_harian_model->total_rows($q);
        $detail_bahan_alat_harian = $this->Detail_bahan_alat_harian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_bahan_alat_harian_data' => $detail_bahan_alat_harian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/detail_bahan_alat_harian/detail_bahan_alat_harian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_bahan_alat_harian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lap_harian_mingguan' => $row->id_lap_harian_mingguan,
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'id_satuan' => $row->id_satuan,
		'id_jenis_bahan_alat' => $row->id_jenis_bahan_alat,
	    );
            $this->load->view('admin/detail_bahan_alat_harian/detail_bahan_alat_harian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_bahan_alat_harian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_bahan_alat_harian/create_action'),
	    'id_lap_harian_mingguan' => set_value('id_lap_harian_mingguan'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'id_satuan' => set_value('id_satuan'),
	    'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat'),
	);
        $this->load->view('admin/detail_bahan_alat_harian/detail_bahan_alat_harian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'id_jenis_bahan_alat' => $this->input->post('id_jenis_bahan_alat',TRUE),
	    );

            $this->Detail_bahan_alat_harian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_bahan_alat_harian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_bahan_alat_harian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_bahan_alat_harian/update_action'),
		'id_lap_harian_mingguan' => set_value('id_lap_harian_mingguan', $row->id_lap_harian_mingguan),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'id_satuan' => set_value('id_satuan', $row->id_satuan),
		'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat', $row->id_jenis_bahan_alat),
	    );
            $this->load->view('admin/detail_bahan_alat_harian/detail_bahan_alat_harian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_bahan_alat_harian'));
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
		'id_jenis_bahan_alat' => $this->input->post('id_jenis_bahan_alat',TRUE),
	    );

            $this->Detail_bahan_alat_harian_model->update($this->input->post('id_lap_harian_mingguan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_bahan_alat_harian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_bahan_alat_harian_model->get_by_id($id);

        if ($row) {
            $this->Detail_bahan_alat_harian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_bahan_alat_harian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_bahan_alat_harian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_satuan', 'id satuan', 'trim|required');
	$this->form_validation->set_rules('id_jenis_bahan_alat', 'id jenis bahan alat', 'trim|required');

	$this->form_validation->set_rules('id_lap_harian_mingguan', 'id_lap_harian_mingguan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detail_bahan_alat_harian.php */
/* Location: ./application/controllers/Detail_bahan_alat_harian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:10 */
/* http://harviacode.com */
