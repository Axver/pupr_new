<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lap_harian_force extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lap_harian_force_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lap_harian_force/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'lap_harian_force/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'lap_harian_force/index.html';
            $config['first_url'] = base_url() . 'lap_harian_force/index.html';
        }

        $config['per_page'] = 100000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Lap_harian_force_model->total_rows($q);
        $lap_harian_force = $this->Lap_harian_force_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lap_harian_force_data' => $lap_harian_force,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('lap_harian_force/lap_harian_mingguan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Lap_harian_force_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lap_harian_mingguan' => $row->id_lap_harian_mingguan,
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'hari_tanggal' => $row->hari_tanggal,
	    );
            $this->load->view('lap_harian_force/lap_harian_mingguan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_harian_force'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lap_harian_force/create_action'),
	    'id_lap_harian_mingguan' => set_value('id_lap_harian_mingguan'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'hari_tanggal' => set_value('hari_tanggal'),
	);
        $this->load->view('lap_harian_force/lap_harian_mingguan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'hari_tanggal' => $this->input->post('hari_tanggal',TRUE),
	    );

            $this->Lap_harian_force_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lap_harian_force'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lap_harian_force_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lap_harian_force/update_action'),
		'id_lap_harian_mingguan' => set_value('id_lap_harian_mingguan', $row->id_lap_harian_mingguan),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'hari_tanggal' => set_value('hari_tanggal', $row->hari_tanggal),
	    );
            $this->load->view('lap_harian_force/lap_harian_mingguan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_harian_force'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lap_harian_mingguan', TRUE));
        } else {
            $data = array(
		'hari_tanggal' => $this->input->post('hari_tanggal',TRUE),
	    );

            $this->Lap_harian_force_model->update($this->input->post('id_lap_harian_mingguan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lap_harian_force'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lap_harian_force_model->get_by_id($id);

        if ($row) {
            $this->Lap_harian_force_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lap_harian_force'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_harian_force'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('hari_tanggal', 'hari tanggal', 'trim|required');

	$this->form_validation->set_rules('id_lap_harian_mingguan', 'id_lap_harian_mingguan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Lap_harian_force.php */
/* Location: ./application/controllers/Lap_harian_force.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-25 04:50:13 */
/* http://harviacode.com */
