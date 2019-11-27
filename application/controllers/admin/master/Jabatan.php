<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jabatan extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/master/M_jabatan");
		$this->load->helper('tgl_indo');
		
	}

	public function index()
	{
		//delete session notif
		// $this->session->unset_userdata('sess_notif');
        // load view 
        $data["rs_data"] = $this->M_jabatan->get_all();
        $get_last_update = $this->M_jabatan->get_all();
        if(!empty($get_last_update)){
			$data['last_update'] = $get_last_update[0]['tanggal'];
		}else{
			$data['last_update'] = 'Tidak Ada';

		}
        //  echo"<pre>";print_r($data);die();
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/master/jabatan/view', $data);
		$this->load->view('admin/dashboard/footer');
        
    }
    
    public function add()
	{
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/master/jabatan/add');
		$this->load->view('admin/dashboard/footer');
    }
	
    public function add_process()
	{
        $nama_jabatan = $this->input->post('nama_jabatan', true);
        $status = $this->input->post('status', true);
        
        //set params
        $params = array(
			'nama_jabatan'     => $nama_jabatan,
            'status'       => $status,
            'tanggal'   => date('Y-m-d')
		);
        $this->M_jabatan->insert('master_jabatan',$params);
		
		$this->notif_msg('admin/master/jabatan/', 'Sukses', 'Data berhasil ditambahkan');

        
	}
	
	public function delete($kode_jabatan)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
        $data["rs_delete"] = $this->M_jabatan->get_jabatan_byid($kode_jabatan);
		$this->load->view('admin/master/jabatan/delete', $data);
		$this->load->view('admin/dashboard/footer');
        
	}
	
	public function delete_process()
	{
		$kode_jabatan = $this->input->post('kode_jabatan', true);
		$where = array(
			'kode_jabatan'	=> $kode_jabatan
		);
        $this->M_jabatan->delete('master_jabatan',$where);
		
		$this->notif_msg('admin/master/jabatan/', 'Sukses', 'Data berhasil dihapus');
		
    }
	
	public function edit($kode_jabatan)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_edit"] = $this->M_jabatan->get_jabatan_byid($kode_jabatan);
		$this->load->view('admin/master/jabatan/edit', $data);
		$this->load->view('admin/dashboard/footer');
        
	}

	public function edit_process()
	{
		$kode_jabatan = $this->input->post('kode_jabatan', true);
        $nama_jabatan = $this->input->post('nama_jabatan', true);
        $status = $this->input->post('status', true);
		
		//set params
        $params = array(
			'nama_jabatan'     => $nama_jabatan,
            'status'       => $status,
            'tanggal'   => date('Y-m-d')
        );
		$where = array(
			'kode_jabatan'=>$kode_jabatan
		);
		$this->M_jabatan->update('master_jabatan',$params,$where);
		
		$this->notif_msg('admin/master/jabatan/', 'Sukses', 'Data berhasil diedit');
        
	}


	
}