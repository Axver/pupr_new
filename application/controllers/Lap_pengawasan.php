<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lap_pengawasan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lap_pengawasan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lap_pengawasan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'lap_pengawasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'lap_pengawasan/index.html';
            $config['first_url'] = base_url() . 'lap_pengawasan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Lap_pengawasan_model->total_rows($q);
        $lap_pengawasan = $this->Lap_pengawasan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lap_pengawasan_data' => $lap_pengawasan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/lap_pengawasan/lap_pengawasan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Lap_pengawasan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lap_pengawasan' => $row->id_lap_pengawasan,
		'id_lap_perencanaan' => $row->id_lap_perencanaan,
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
	    );
            $this->load->view('admin/lap_pengawasan/lap_pengawasan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_pengawasan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lap_pengawasan/create_action'),
	    'id_lap_pengawasan' => set_value('id_lap_pengawasan'),
	    'id_lap_perencanaan' => set_value('id_lap_perencanaan'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	);
        $this->load->view('admin/lap_pengawasan/lap_pengawasan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->Lap_pengawasan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lap_pengawasan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lap_pengawasan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lap_pengawasan/update_action'),
		'id_lap_pengawasan' => set_value('id_lap_pengawasan', $row->id_lap_pengawasan),
		'id_lap_perencanaan' => set_value('id_lap_perencanaan', $row->id_lap_perencanaan),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
	    );
            $this->load->view('admin/lap_pengawasan/lap_pengawasan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_pengawasan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lap_pengawasan', TRUE));
        } else {
            $data = array(
	    );

            $this->Lap_pengawasan_model->update($this->input->post('id_lap_pengawasan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lap_pengawasan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lap_pengawasan_model->get_by_id($id);

        if ($row) {
            $this->Lap_pengawasan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lap_pengawasan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lap_pengawasan'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('id_lap_pengawasan', 'id_lap_pengawasan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Lap_pengawasan.php */
/* Location: ./application/controllers/Lap_pengawasan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-12 08:45:12 */
/* http://harviacode.com */
