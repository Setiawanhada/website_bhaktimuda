<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Presensi extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/M_presensi");
		$this->load->helper('tgl_indo');
		
	}

	public function view()
	{
		//delete session notif
		// $this->session->unset_userdata('sess_notif');
        // load view 
        $data["rs_data"] = $this->M_presensi->get_all();
        $get_last_update = $this->M_presensi->get_all();
        if(!empty($get_last_update)){
			$data['last_update'] = $get_last_update[0]['tanggal'];
		}else{
			$data['last_update'] = 'Tidak Ada';

		}
        // echo"<pre>";print_r($data);die();
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/presensi/view', $data);
		$this->load->view('admin/dashboard/footer');
        
    }
    
    public function add()
	{
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/presensi/add');
		$this->load->view('admin/dashboard/footer');
    }
	
    public function add_process()
	{
		$bulan = $this->input->post('bulan', true);
		$tahun = $this->input->post('tahun', true);
        $jml = $this->input->post('jml', true);
        $link = $this->input->post('link', true);
        
		$number = mt_rand(100, 999);
		$prefix = 'PR';
		$generateId = $prefix.$number.date('Ymd');
        //set params
        $params = array(
            'id_presensi'   => $generateId,
			'bulan'     => $bulan,
			'tahun'		=> $tahun,
            'jml'     => $jml,
            'link'       => $link,
            'tanggal'   => date('Y-m-d')
        );
		
		
        $this->M_presensi->insert($params);
		
		$this->notif_msg('admin/informasi/add', 'Sukses', 'Data berhasil ditambahkan');
        
	}
	
	public function delete($id_presensi)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
        $data["rs_delete"] = $this->M_presensi->get_presensi_byid($id_presensi);
		$this->load->view('admin/presensi/delete', $data);
		$this->load->view('admin/dashboard/footer');
        
	}
	
	public function delete_process()
	{
		$id_presensi = $this->input->post('id_presensi', true);
		$where = array(
			'id_presensi'	=> $id_presensi
		);
        $this->M_presensi->delete('presensi',$where);
		
		$this->notif_msg('admin/presensi/view', 'Sukses', 'Data berhasil dihapus');
		
    }
	
	public function edit($id_presensi)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_edit"] = $this->M_presensi->get_presensi_byid($id_presensi);
		// echo"<pre>";print_r($data);die();
		$this->load->view('admin/presensi/edit', $data);
		$this->load->view('admin/dashboard/footer');
        
	}

	public function edit_process()
	{
		$id_presensi = $this->input->post('id_presensi', true);
		$bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);
        $jml = $this->input->post('jml', true);
        $link = $this->input->post('link', true);
		
		//set params
		$params = array(
			'bulan' 	=> $bulan,
			'tahun'   	=> $tahun,
			'jml'   	=> $jml,
			'link' 		=> $link
		);
		$where = array(
			'id_presensi'=>$id_presensi
		);
		$this->M_presensi->update('presensi',$params,$where);
		
		$this->notif_msg('admin/presensi/view', 'Sukses', 'Data berhasil diedit');
        
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