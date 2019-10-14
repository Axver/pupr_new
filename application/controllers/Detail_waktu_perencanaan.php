<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_waktu_perencanaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_waktu_perencanaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_waktu_perencanaan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_waktu_perencanaan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_waktu_perencanaan/index.html';
            $config['first_url'] = base_url() . 'detail_waktu_perencanaan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_waktu_perencanaan_model->total_rows($q);
        $detail_waktu_perencanaan = $this->Detail_waktu_perencanaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_waktu_perencanaan_data' => $detail_waktu_perencanaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/detail_waktu_perencanaan/detail_waktu_perencanaan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_waktu_perencanaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'tgl' => $row->tgl,
		'bulan' => $row->bulan,
		'minggu' => $row->minggu,
	    );
            $this->load->view('admin/detail_waktu_perencanaan/detail_waktu_perencanaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_waktu_perencanaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_waktu_perencanaan/create_action'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'tgl' => set_value('tgl'),
	    'bulan' => set_value('bulan'),
	    'minggu' => set_value('minggu'),
	);
        $this->load->view('admin/detail_waktu_perencanaan/detail_waktu_perencanaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->Detail_waktu_perencanaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_waktu_perencanaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_waktu_perencanaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_waktu_perencanaan/update_action'),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'tgl' => set_value('tgl', $row->tgl),
		'bulan' => set_value('bulan', $row->bulan),
		'minggu' => set_value('minggu', $row->minggu),
	    );
            $this->load->view('admin/detail_waktu_perencanaan/detail_waktu_perencanaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_waktu_perencanaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lap_perencanaan', TRUE));
        } else {
            $data = array(
	    );

            $this->Detail_waktu_perencanaan_model->update($this->input->post('id_lap_perencanaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_waktu_perencanaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_waktu_perencanaan_model->get_by_id($id);

        if ($row) {
            $this->Detail_waktu_perencanaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_waktu_perencanaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_waktu_perencanaan'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('id_lap_perencanaan', 'id_lap_perencanaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detail_waktu_perencanaan.php */
/* Location: ./application/controllers/Detail_waktu_perencanaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:11 */
/* http://harviacode.com */
