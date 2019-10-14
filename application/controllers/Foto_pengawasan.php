<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Foto_pengawasan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Foto_pengawasan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'foto_pengawasan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'foto_pengawasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'foto_pengawasan/index.html';
            $config['first_url'] = base_url() . 'foto_pengawasan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Foto_pengawasan_model->total_rows($q);
        $foto_pengawasan = $this->Foto_pengawasan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'foto_pengawasan_data' => $foto_pengawasan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/foto_pengawasan/foto_pengawasan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Foto_pengawasan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_foto_pengawasan' => $row->id_foto_pengawasan,
		'id_lap_pengawasan' => $row->id_lap_pengawasan,
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'foto_pengawasan' => $row->foto_pengawasan,
	    );
            $this->load->view('admin/foto_pengawasan/foto_pengawasan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto_pengawasan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('foto_pengawasan/create_action'),
	    'id_foto_pengawasan' => set_value('id_foto_pengawasan'),
	    'id_lap_pengawasan' => set_value('id_lap_pengawasan'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'foto_pengawasan' => set_value('foto_pengawasan'),
	);
        $this->load->view('admin/foto_pengawasan/foto_pengawasan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'foto_pengawasan' => $this->input->post('foto_pengawasan',TRUE),
	    );

            $this->Foto_pengawasan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('foto_pengawasan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Foto_pengawasan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('foto_pengawasan/update_action'),
		'id_foto_pengawasan' => set_value('id_foto_pengawasan', $row->id_foto_pengawasan),
		'id_lap_pengawasan' => set_value('id_lap_pengawasan', $row->id_lap_pengawasan),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'foto_pengawasan' => set_value('foto_pengawasan', $row->foto_pengawasan),
	    );
            $this->load->view('admin/foto_pengawasan/foto_pengawasan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto_pengawasan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_foto_pengawasan', TRUE));
        } else {
            $data = array(
		'foto_pengawasan' => $this->input->post('foto_pengawasan',TRUE),
	    );

            $this->Foto_pengawasan_model->update($this->input->post('id_foto_pengawasan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('foto_pengawasan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Foto_pengawasan_model->get_by_id($id);

        if ($row) {
            $this->Foto_pengawasan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('foto_pengawasan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto_pengawasan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('foto_pengawasan', 'foto pengawasan', 'trim|required');

	$this->form_validation->set_rules('id_foto_pengawasan', 'id_foto_pengawasan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Foto_pengawasan.php */
/* Location: ./application/controllers/Foto_pengawasan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:11 */
/* http://harviacode.com */
