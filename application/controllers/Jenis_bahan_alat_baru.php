<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_bahan_alat_baru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_bahan_alat_baru_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_bahan_alat_baru/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_bahan_alat_baru/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_bahan_alat_baru/index.html';
            $config['first_url'] = base_url() . 'jenis_bahan_alat_baru/index.html';
        }

        $config['per_page'] = 100000000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_bahan_alat_baru_model->total_rows($q);
        $jenis_bahan_alat_baru = $this->Jenis_bahan_alat_baru_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_bahan_alat_baru_data' => $jenis_bahan_alat_baru,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenis_bahan_alat_baru/jenis_bahan_alat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_bahan_alat_baru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_bahan_alat' => $row->id_jenis_bahan_alat,
		'jenis_bahan_alat' => $row->jenis_bahan_alat,
		'harga' => $row->harga,
	    );
            $this->load->view('jenis_bahan_alat_baru/jenis_bahan_alat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_bahan_alat_baru'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_bahan_alat_baru/create_action'),
	    'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat'),
	    'jenis_bahan_alat' => set_value('jenis_bahan_alat'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('jenis_bahan_alat_baru/jenis_bahan_alat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $id=$this->db->query("SELECT MAX(CAST(id_jenis_bahan_alat AS int)) as max FROM jenis_bahan_alat")->result();
            $count=count($id);
            $id_max=0;

            $i=0;

            while($i<$count)
            {
                 $id_max=$id[$i]->max;

                $i++;
            }

            $id_max=$id_max+1;
            $data = array(
                'id_jenis_bahan_alat'=>$id_max,
		'jenis_bahan_alat' => $this->input->post('jenis_bahan_alat',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Jenis_bahan_alat_baru_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_bahan_alat_baru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_bahan_alat_baru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_bahan_alat_baru/update_action'),
		'id_jenis_bahan_alat' => set_value('id_jenis_bahan_alat', $row->id_jenis_bahan_alat),
		'jenis_bahan_alat' => set_value('jenis_bahan_alat', $row->jenis_bahan_alat),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('jenis_bahan_alat_baru/jenis_bahan_alat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_bahan_alat_baru'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_bahan_alat', TRUE));
        } else {
            $data = array(
		'jenis_bahan_alat' => $this->input->post('jenis_bahan_alat',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Jenis_bahan_alat_baru_model->update($this->input->post('id_jenis_bahan_alat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_bahan_alat_baru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_bahan_alat_baru_model->get_by_id($id);

        if ($row) {
            $this->Jenis_bahan_alat_baru_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_bahan_alat_baru'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_bahan_alat_baru'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_bahan_alat', 'jenis bahan alat', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_jenis_bahan_alat', 'id_jenis_bahan_alat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_bahan_alat_baru.php */
/* Location: ./application/controllers/Jenis_bahan_alat_baru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-08 13:52:18 */
/* http://harviacode.com */