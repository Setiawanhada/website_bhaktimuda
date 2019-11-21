<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Informasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/M_informasi");
        $this->load->helper('tgl_indo');
	}

	public function view()
	{
        // load view 
        $data["rs_data"] = $this->M_informasi->get_all();
        $get_last_update = $this->M_informasi->get_all();
        $data['last_update'] = $get_last_update[0]['tanggal'];
        
        // echo"<pre>";print_r($data);die();
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/informasi/view', $data);
		$this->load->view('admin/dashboard/footer');
        
    }
    
    public function add()
	{
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/informasi/add');
		$this->load->view('admin/dashboard/footer');
        
    }
    
    public function add_process()
	{
		$judul = $this->input->post('judul', true);
        $isi = $this->input->post('isi', true);
        
        $params_id = 'IF';        
		$kode_info = $this->M_informasi->generate_info_id($params_id);
        $params = array(
            'kode_info' => $kode_info,
            'judul' => $judul,
            'isi'   => $isi,
            'tanggal'   => date('Y-m-d')
        );
            // echo"<pre>";print_r($params);die();
		$this->M_informasi->insert_informasi($params);
        
	}
}