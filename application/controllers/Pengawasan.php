<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengawasan extends CI_Controller {

	public function index()
	{
		$data['user']=$this->db->get("account")->result();
		$this->load->view("pengawasan/index",$data);
	}

	public function login_user()
	{
		$data['user']=$this->db->get("account")->result();
		$this->load->view("pengawasan/login_user",$data);
	}

	public function read($id)
	{

		$query = $this->db->query("SELECT count(id_paket) as ip FROM detail_paket WHERE nip='$id'")->result();

		$data['jumlah']= array(
		   'jumlah'=>$query
		);
      $this->load->view("pengawasan/read",$data);
	}

	public function hitung()
	{
//		get Detail Paket
		$get=$this->db->get("")/
		$id_user=$this->input->post("id");
		$count_perencanaan=$this->db->query("SELECT COUNT(nip)  as perencanaan FROM lap_perencanaan WHERE nip='$id_user'")->result();
		$count_pengawasan=$this->db->query("SELECT COUNT(nip) as pengawasan FROM lap_pengawasan WHERE nip='$id_user'")->result();
		$count_harian=$this->db->query("SELECT COUNT(nip) as harian FROM lap_harian_mingguan WHERE nip='$id_user'")->result();
		$count_paket=$this->db->query("SELECT COUNT(nip) as paket FROM detail_paket WHERE nip='$id_user'")->result();
		$data=array(
		"perencanaan"=>$count_perencanaan,
		"pengawasan"=>$count_pengawasan,
		"harian"=>$count_harian,
			"paket"=>$count_paket
		);

		echo json_encode($data);
	}

	public function paket($i)
	{
		$this->load->view("pengawasan/paket");
	}

	public function harian($i)
	{
		$this->load->view("pengawasan/harian");
	}

	public function pengawasan_($i)
	{
		$this->load->view("pengawasan/pengawasan");
	}

	public function perencanaan($i)
	{
		$this->load->view("pengawasan/perencanaan");
	}

	public function alih_paket()
	{
       $id_paket=$this->input->post("id_paket");
       $id_user=$this->input->post("id_user");

		$this->db->set('nip', $id_user);
		$this->db->where('id_paket', $id_paket);
		$this->db->update('detail_paket');
	}

	public function login($nip)
	{
//		Cari nama dan Privilage dari user
		$selData=$this->db->get_where("account",array("nip"=>$nip))->result();
//      Cek Privilage dulu
		if($this->session->userdata("privilage")==1)
		{
//           Proses Loginnya disini
			$data= array(
				'nip'=>$nip,
				'nama'=>$selData[0]->nama,
				'privilage'=>$selData[0]->privilage
			);

			$this->session->set_userdata($data);
			if($selData[0]->privilage==1)
			{

				redirect(base_url()."admin");
			}
			else if($selData[0]->privilage==2)
			{
				redirect(base_url()."user");
			}

		}
		else
		{

//			Tidak Bisa Login
			redirect(base_url());
		}
	}
}
