<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_admin extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
		// load view admin/overview.php
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/dashboard/body');
		$this->load->view('admin/dashboard/footer');
		
	}
}