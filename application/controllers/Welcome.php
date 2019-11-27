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
		$data["rs_inti"] = $this->M_welcome->get_inti();
		$this->load->view("pengurus", $data);
		$this->load->view("footer");
	}
}
