<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'account/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'account/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'account/index.html';
            $config['first_url'] = base_url() . 'account/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Account_model->total_rows($q);
        $account = $this->Account_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'account_data' => $account,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('account/account_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Account_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nip' => $row->nip,
		'nama' => $row->nama,
		'password' => $row->password,
		'privilage' => $row->privilage,
	    );
            $this->load->view('account/account_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('account/create_action'),
	    'nip' => set_value('nip'),
	    'nama' => set_value('nama'),
	    'password' => set_value('password'),
	    'privilage' => set_value('privilage'),
	);
        $this->load->view('account/account_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'password' => $this->input->post('password',TRUE),
		'privilage' => $this->input->post('privilage',TRUE),
	    );

            $this->Account_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('account'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Account_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('account/update_action'),
		'nip' => set_value('nip', $row->nip),
		'nama' => set_value('nama', $row->nama),
		'password' => set_value('password', $row->password),
		'privilage' => set_value('privilage', $row->privilage),
	    );
            $this->load->view('account/account_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nip', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'password' => $this->input->post('password',TRUE),
		'privilage' => $this->input->post('privilage',TRUE),
	    );

            $this->Account_model->update($this->input->post('nip', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('account'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Account_model->get_by_id($id);

        if ($row) {
            $this->Account_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('account'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('privilage', 'privilage', 'trim|required');

	$this->form_validation->set_rules('nip', 'nip', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-06 16:52:49 */
/* http://harviacode.com */