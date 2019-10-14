<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Foto_harian_mingguan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Foto_harian_mingguan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'foto_harian_mingguan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'foto_harian_mingguan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'foto_harian_mingguan/index.html';
            $config['first_url'] = base_url() . 'foto_harian_mingguan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Foto_harian_mingguan_model->total_rows($q);
        $foto_harian_mingguan = $this->Foto_harian_mingguan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'foto_harian_mingguan_data' => $foto_harian_mingguan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/foto_harian_mingguan/foto_harian_mingguan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Foto_harian_mingguan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_foto' => $row->id_foto,
		'id_lap_harian_mingguan' => $row->id_lap_harian_mingguan,
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'foto' => $row->foto,
	    );
            $this->load->view('admin/foto_harian_mingguan/foto_harian_mingguan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto_harian_mingguan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('foto_harian_mingguan/create_action'),
	    'id_foto' => set_value('id_foto'),
	    'id_lap_harian_mingguan' => set_value('id_lap_harian_mingguan'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'foto' => set_value('foto'),
	);
        $this->load->view('admin/foto_harian_mingguan/foto_harian_mingguan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Foto_harian_mingguan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('foto_harian_mingguan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Foto_harian_mingguan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('foto_harian_mingguan/update_action'),
		'id_foto' => set_value('id_foto', $row->id_foto),
		'id_lap_harian_mingguan' => set_value('id_lap_harian_mingguan', $row->id_lap_harian_mingguan),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('admin/foto_harian_mingguan/foto_harian_mingguan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto_harian_mingguan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_foto', TRUE));
        } else {
            $data = array(
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Foto_harian_mingguan_model->update($this->input->post('id_foto', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('foto_harian_mingguan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Foto_harian_mingguan_model->get_by_id($id);

        if ($row) {
            $this->Foto_harian_mingguan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('foto_harian_mingguan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto_harian_mingguan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_foto', 'id_foto', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Foto_harian_mingguan.php */
/* Location: ./application/controllers/Foto_harian_mingguan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:11 */
/* http://harviacode.com */
