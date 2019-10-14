<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_jenis_pekerjaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_jenis_pekerjaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_jenis_pekerjaan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_jenis_pekerjaan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_jenis_pekerjaan/index.html';
            $config['first_url'] = base_url() . 'detail_jenis_pekerjaan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_jenis_pekerjaan_model->total_rows($q);
        $detail_jenis_pekerjaan = $this->Detail_jenis_pekerjaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_jenis_pekerjaan_data' => $detail_jenis_pekerjaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/detail_jenis_pekerjaan/detail_jenis_pekerjaan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_jenis_pekerjaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'tukang' => $row->tukang,
		'pekerja' => $row->pekerja,
	    );
            $this->load->view('admin/detail_jenis_pekerjaan/detail_jenis_pekerjaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_jenis_pekerjaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_jenis_pekerjaan/create_action'),
	    'id' => set_value('id'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'tukang' => set_value('tukang'),
	    'pekerja' => set_value('pekerja'),
	);
        $this->load->view('admin/detail_jenis_pekerjaan/detail_jenis_pekerjaan_form', $data);
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
	    );

            $this->Detail_jenis_pekerjaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_jenis_pekerjaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_jenis_pekerjaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_jenis_pekerjaan/update_action'),
		'id' => set_value('id', $row->id),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'tukang' => set_value('tukang', $row->tukang),
		'pekerja' => set_value('pekerja', $row->pekerja),
	    );
            $this->load->view('admin/detail_jenis_pekerjaan/detail_jenis_pekerjaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_jenis_pekerjaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tukang' => $this->input->post('tukang',TRUE),
		'pekerja' => $this->input->post('pekerja',TRUE),
	    );

            $this->Detail_jenis_pekerjaan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_jenis_pekerjaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_jenis_pekerjaan_model->get_by_id($id);

        if ($row) {
            $this->Detail_jenis_pekerjaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_jenis_pekerjaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_jenis_pekerjaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tukang', 'tukang', 'trim|required');
	$this->form_validation->set_rules('pekerja', 'pekerja', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detail_jenis_pekerjaan.php */
/* Location: ./application/controllers/Detail_jenis_pekerjaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:10 */
/* http://harviacode.com */
