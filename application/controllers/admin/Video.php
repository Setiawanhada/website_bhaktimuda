<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/M_video");
		$this->load->helper('tgl_indo');
		
	}

	public function view()
	{
		//delete session notif
		// $this->session->unset_userdata('sess_notif');
        // load view 
        $data["rs_data"] = $this->M_video->get_all();
        $get_last_update = $this->M_video->get_all();
        if(!empty($get_last_update)){
			$data['last_update'] = $get_last_update[0]['tanggal'];
		}else{
			$data['last_update'] = 'Tidak Ada';

		}
        // echo"<pre>";print_r($data);die();
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/video/view', $data);
		$this->load->view('admin/dashboard/footer');
        
    }
    
    public function add()
	{
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/video/add');
		$this->load->view('admin/dashboard/footer');
    }
	
    public function add_process()
	{
		$judul = $this->input->post('judul', true);
        $link = $this->input->post('link', true);
        
		$number = mt_rand(100, 999);
		$prefix = 'VD';
		$generateId = $prefix.$number.date('Ymd');
        //set params
        $params = array(
            'kode_video'  => $generateId,
			'judul'     => $judul,
            'link'       => $link,
            'tanggal'   => date('Y-m-d')
        );
		
        $this->M_video->insert('video',$params);
		
		$this->notif_msg('admin/video/add', 'Sukses', 'Data berhasil ditambahkan');
        
	}
	
	public function delete($kode_video)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
        $data["rs_delete"] = $this->M_video->get_video_byid($kode_video);
		$this->load->view('admin/video/delete', $data);
		$this->load->view('admin/dashboard/footer');
        
	}
	
	public function delete_process()
	{
		$kode_video = $this->input->post('kode_video', true);
		$where = array(
			'kode_video'	=> $kode_video
		);
        $this->M_video->delete('video',$where);
		
		$this->notif_msg('admin/video/view', 'Sukses', 'Data berhasil dihapus');
		
    }
	
	public function edit($kode_video)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_edit"] = $this->M_video->get_video_byid($kode_video);
		$this->load->view('admin/video/edit', $data);
		$this->load->view('admin/dashboard/footer');
        
	}

	public function edit_process()
	{
		$kode_video = $this->input->post('kode_video', true);
		$judul = $this->input->post('judul', true);
        $link = $this->input->post('link', true);
		
		//set params
		$params = array(
			'judul' 	=> $judul,
			'link' 		=> $link
		);
		$where = array(
			'kode_video'=>$kode_video
		);
		$this->M_video->update('video',$params,$where);
		
		$this->notif_msg('admin/video/view', 'Sukses', 'Data berhasil diedit');
        
	}

	//kirim notifikasi
	public function notif_msg($content, $tipe, $pesan)
	{
		// var_dump($content, $tipe, $pesan);die();
		if (!empty($tipe) && !empty($pesan)) {
			if ($tipe == 'Sukses') {
				$tipe_notif = 'Sukses';
			}else{
				$tipe_notif = 'Error';
			}
			$data = [
				'tipe'  => $tipe_notif,
				'pesan' => $pesan
			];
			$this->session->set_userdata('sess_notif', $data);
			redirect($content);
		}
	}

	
}