<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upah_pekerja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Upah_pekerja_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'upah_pekerja/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'upah_pekerja/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'upah_pekerja/index.html';
            $config['first_url'] = base_url() . 'upah_pekerja/index.html';
        }

        $config['per_page'] = 1000000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Upah_pekerja_model->total_rows($q);
        $upah_pekerja = $this->Upah_pekerja_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'upah_pekerja_data' => $upah_pekerja,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('upah_pekerja/jenis_upah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Upah_pekerja_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_upah' => $row->id_jenis_upah,
		'nama' => $row->nama,
		'harga' => $row->harga,
	    );
            $this->load->view('upah_pekerja/jenis_upah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('upah_pekerja'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('upah_pekerja/create_action'),
	    'id_jenis_upah' => set_value('id_jenis_upah'),
	    'nama' => set_value('nama'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('upah_pekerja/jenis_upah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $id=$this->db->query("SELECT MAX(CAST(id_jenis_upah AS int)) as max FROM jenis_upah")->result();
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
                'id_jenis_upah'=>$id_max,
		'nama' => $this->input->post('nama',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Upah_pekerja_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('upah_pekerja'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Upah_pekerja_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('upah_pekerja/update_action'),
		'id_jenis_upah' => set_value('id_jenis_upah', $row->id_jenis_upah),
		'nama' => set_value('nama', $row->nama),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('upah_pekerja/jenis_upah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('upah_pekerja'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_upah', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Upah_pekerja_model->update($this->input->post('id_jenis_upah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('upah_pekerja'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Upah_pekerja_model->get_by_id($id);

        if ($row) {
            $this->Upah_pekerja_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('upah_pekerja'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('upah_pekerja'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_jenis_upah', 'id_jenis_upah', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Upah_pekerja.php */
/* Location: ./application/controllers/Upah_pekerja.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-08 14:14:38 */
/* http://harviacode.com */