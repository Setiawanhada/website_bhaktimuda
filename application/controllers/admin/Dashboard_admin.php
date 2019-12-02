<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_admin extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model("admin/M_dashboard_admin");

	}

	public function index()
	{
		// load view admin/overview.php
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_total_info"] = $this->M_dashboard_admin->get_total_info();
		$data["rs_total_foto"] = $this->M_dashboard_admin->get_total_foto();
		$data["rs_total_video"] = $this->M_dashboard_admin->get_total_video();
		$this->load->view('admin/dashboard/body',$data);
		$this->load->view('admin/dashboard/footer');
		
	}
}