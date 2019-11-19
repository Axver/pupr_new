<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket_informasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_informasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'paket_informasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'paket_informasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'paket_informasi/index.html';
            $config['first_url'] = base_url() . 'paket_informasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Paket_informasi_model->total_rows($q);
        $paket_informasi = $this->Paket_informasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'paket_informasi_data' => $paket_informasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/paket_informasi/paket_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Paket_informasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_paket' => $row->id_paket,
		'tahun' => $row->tahun,
		'nama' => $row->nama,
		'jumlah_tahap' => $row->jumlah_tahap,
		'jenis_pekerjaan' => $row->jenis_pekerjaan,
		'masa_pelaksanaan' => $row->masa_pelaksanaan,
		'lokasi' => $row->lokasi,
		'tahun_anggaran' => $row->tahun_anggaran,
		'nilai_paket' => $row->nilai_paket,
	    );
            $this->load->view('admin/paket_informasi/paket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket_informasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paket_informasi/create_action'),
	    'id_paket' => set_value('id_paket'),
	    'tahun' => set_value('tahun'),
	    'nama' => set_value('nama'),
	    'jumlah_tahap' => set_value('jumlah_tahap'),
	    'jenis_pekerjaan' => set_value('jenis_pekerjaan'),
	    'masa_pelaksanaan' => set_value('masa_pelaksanaan'),
	    'lokasi' => set_value('lokasi'),
	    'tahun_anggaran' => set_value('tahun_anggaran'),
	    'nilai_paket' => set_value('nilai_paket'),
	);
        $this->load->view('admin/paket_informasi/paket_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			//			Id Paket
			$max=$this->db->query("SELECT MAX(CAST(id_paket AS INT)) as max FROM paket")->result();
			$max=$max[0]->max+1;
            $data = array(
            	'id_paket'=>$max,
		'nama' => $this->input->post('nama',TRUE),
		'jumlah_tahap' => $this->input->post('jumlah_tahap',TRUE),
		'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan',TRUE),
		'masa_pelaksanaan' => $this->input->post('masa_pelaksanaan',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'tahun_anggaran' => $this->input->post('tahun_anggaran',TRUE),
		'nilai_paket' => $this->input->post('nilai_paket',TRUE),
	    );

            $this->Paket_informasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paket_informasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Paket_informasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paket_informasi/update_action'),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'tahun' => set_value('tahun', $row->tahun),
		'nama' => set_value('nama', $row->nama),
		'jumlah_tahap' => set_value('jumlah_tahap', $row->jumlah_tahap),
		'jenis_pekerjaan' => set_value('jenis_pekerjaan', $row->jenis_pekerjaan),
		'masa_pelaksanaan' => set_value('masa_pelaksanaan', $row->masa_pelaksanaan),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'tahun_anggaran' => set_value('tahun_anggaran', $row->tahun_anggaran),
		'nilai_paket' => set_value('nilai_paket', $row->nilai_paket),
	    );
            $this->load->view('admin/paket_informasi/paket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket_informasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_paket', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'jumlah_tahap' => $this->input->post('jumlah_tahap',TRUE),
		'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan',TRUE),
		'masa_pelaksanaan' => $this->input->post('masa_pelaksanaan',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'tahun_anggaran' => $this->input->post('tahun_anggaran',TRUE),
		'nilai_paket' => $this->input->post('nilai_paket',TRUE),
	    );

            $this->Paket_informasi_model->update($this->input->post('id_paket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paket_informasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paket_informasi_model->get_by_id($id);

        if ($row) {
            $this->Paket_informasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paket_informasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paket_informasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jumlah_tahap', 'jumlah tahap', 'trim|required');
	$this->form_validation->set_rules('jenis_pekerjaan', 'jenis pekerjaan', 'trim|required');
	$this->form_validation->set_rules('masa_pelaksanaan', 'masa pelaksanaan', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'trim|required');
	$this->form_validation->set_rules('nilai_paket', 'nilai paket', 'trim|required');

	$this->form_validation->set_rules('id_paket', 'id_paket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Paket_informasi.php */
/* Location: ./application/controllers/Paket_informasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-19 02:56:30 */
/* http://harviacode.com */
