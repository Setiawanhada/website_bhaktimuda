<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_anggota extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
		// load view admin/overview.php
		$this->load->view('anggota/dashboard/head');
		$this->load->view('anggota/dashboard/sidebar');
		$this->load->view('anggota/dashboard/body');
		$this->load->view('anggota/dashboard/footer');
		
	}
}