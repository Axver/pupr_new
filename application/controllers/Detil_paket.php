<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detil_paket extends CI_Controller {

	public function index()
	{
		$postData = $this->input->post();
		$paket=$postData['paket'];
		$this->session->set_userdata('paket', 'paket');
//		$this->load->view('admin/detil_paket');
		redirect(base_url('detil_paket/data/'.$paket));

	}

	public function data($test)
	{
		$this->load->view('admin/detil_paket',$test);
	}

	public function minggu($test)
	{
//		echo $test;
		$list['laporan']=$this->mingguan_model->get_mingguan($test)->result();
		$this->load->view('admin/mingguan',$list);
	}

	public function bulan($test)
	{
		$this->load->view('admin/bulanan',$test);
	}

	public function pengawasan($test)
	{
		$this->load->view('admin/pengawasan',$test);
	}

	public function caturwulan($test)
	{
		$this->load->view('admin/caturwulan',$test);
	}

	public function add_mingguan($id_mingguan,$id_paket,$tahun)
	{

      $data= array(
      	'id_lap_harian_mingguan'=>$id_mingguan,
		  'id_paket'=>$id_paket,
		  'tahun'=>$tahun
	  );
      $this->db->insert('lap_harian_mingguan', $data);

      echo "Success";
	}

	function view_minggu($id_minggu,$id_paket)
	{
       $this->load->view("admin/view_minggu");
	}
	function edit_minggu($id_minggu,$id_paket)
	{

	}
	function delete_minggu($id_minggu,$id_paket)
	{

	}

	function add_satuan($id_satuan,$satuan)
	{
		$data= array(
			'id_satuan'=>$id_satuan,
			'satuan'=>$satuan
		);
		$result=$this->db->insert('satuan', $data);
		if($result)
		{
			echo "Success";
		}
		else
		{
			echo "Failed";
		}

	}
}
