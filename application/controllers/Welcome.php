<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_welcome");
		$this->load->helper('tgl_indo');
		
	}

	public function index()
	{
		// $this->load->view("maintenance");
		$this->load->view("header");
		$data["rs_data"] = $this->M_welcome->get_informasi_dashboard();
		$this->load->view("body", $data);
		$this->load->view("footer");
	}

	public function info()
	{
		$this->load->view("header");
		$data["rs_data"] = $this->M_welcome->get_informasi();
		$this->load->view("info", $data);
		$this->load->view("footer");
	}

	public function foto()
	{
		$this->load->view("header");
		$data["rs_data"] = $this->M_welcome->get_foto();
		$this->load->view("foto", $data);
		$this->load->view("footer");
	}

	public function video()
	{
		$this->load->view("header");
		$data["rs_data"] = $this->M_welcome->get_video();
		$this->load->view("video", $data);
		$this->load->view("footer");
	}

	public function presensi()
	{
		$this->load->view("header");
		$data["rs_data"] = $this->M_welcome->get_presensi();
		$this->load->view("presensi", $data);
		$this->load->view("footer");
	}

	public function pengurus()
	{
		$this->load->view("header");

		$params_inti = array(
			'kode_jabatan'	=> '4',
			'status'		=> '1'
		);
		$params_sekretaris = array(
			'kode_jabatan'	=> '5',
			'status'		=> '1'
		);
		$params_bendahara = array(
			'kode_jabatan'	=> '6',
			'status'		=> '1'
		);
		$params_humas = array(
			'kode_jabatan'	=> '7',
			'status'		=> '1'
		);
		$params_perkap = array(
			'kode_jabatan'	=> '8',
			'status'		=> '1'
		);
		$params_pendidikan = array(
			'kode_jabatan'	=> '9',
			'status'		=> '1'
		);
		$params_agama = array(
			'kode_jabatan'	=> '10',
			'status'		=> '1'
		);

		$data["rs_inti"] = $this->M_welcome->get_inti($params_inti);
		$data["rs_sekretaris"] = $this->M_welcome->get_sekretaris($params_sekretaris);
		$data["rs_bendahara"] = $this->M_welcome->get_bendahara($params_bendahara);
		$data["rs_humas"] = $this->M_welcome->get_humas($params_humas);
		$data["rs_perkap"] = $this->M_welcome->get_perkap($params_perkap);
		$data["rs_pendidikan"] = $this->M_welcome->get_pendidikan($params_pendidikan);
		$data["rs_agama"] = $this->M_welcome->get_agama($params_agama);
		$this->load->view("pengurus", $data);
		$this->load->view("footer");
	}
}
