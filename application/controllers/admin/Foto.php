<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Foto extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/M_foto");
		$this->load->helper('tgl_indo');
		
	}

	public function view()
	{
		//delete session notif
		// $this->session->unset_userdata('sess_notif');
        // load view 
        $data["rs_data"] = $this->M_foto->get_all();
        $get_last_update = $this->M_foto->get_all();
        if(!empty($get_last_update)){
			$data['last_update'] = $get_last_update[0]['tanggal'];
		}else{
			$data['last_update'] = 'Tidak Ada';

		}
        // echo"<pre>";print_r($data);die();
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/foto/view', $data);
		$this->load->view('admin/dashboard/footer');
        
    }
    
    public function add()
	{
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/foto/add');
		$this->load->view('admin/dashboard/footer');
    }
	
    public function add_process()
	{
		$judul = $this->input->post('judul', true);
        $link = $this->input->post('link', true);
        
		$number = mt_rand(100, 999);
		$prefix = 'FT';
		$generateId = $prefix.$number.date('Ymd');
        //set params
        $params = array(
            'kode_foto'  => $generateId,
			'judul'     => $judul,
            'link'       => $link,
            'tanggal'   => date('Y-m-d')
        );
		
        $this->M_foto->insert('foto',$params);
		
		$this->notif_msg('admin/foto/add', 'Sukses', 'Data berhasil ditambahkan');
        
	}
	
	public function delete($kode_foto)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
        $data["rs_delete"] = $this->M_foto->get_foto_byid($kode_foto);
		$this->load->view('admin/foto/delete', $data);
		$this->load->view('admin/dashboard/footer');
        
	}
	
	public function delete_process()
	{
		$kode_foto = $this->input->post('kode_foto', true);
		$where = array(
			'kode_foto'	=> $kode_foto
		);
        $this->M_foto->delete('foto',$where);
		
		$this->notif_msg('admin/foto/view', 'Sukses', 'Data berhasil dihapus');
		
    }
	
	public function edit($kode_foto)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_edit"] = $this->M_foto->get_foto_byid($kode_foto);
		$this->load->view('admin/foto/edit', $data);
		$this->load->view('admin/dashboard/footer');
        
	}

	public function edit_process()
	{
		$kode_foto = $this->input->post('kode_foto', true);
		$judul = $this->input->post('judul', true);
        $link = $this->input->post('link', true);
		
		//set params
		$params = array(
			'judul' 	=> $judul,
			'link' 		=> $link
		);
		$where = array(
			'kode_foto'=>$kode_foto
		);
		$this->M_foto->update('foto',$params,$where);
		
		notif_msg('admin/foto/view', 'Sukses', 'Data berhasil diedit');
        
	}

	
}