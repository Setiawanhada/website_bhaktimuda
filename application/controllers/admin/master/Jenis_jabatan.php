<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jenis_jabatan extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/master/M_jenis_jabatan");
		$this->load->helper('tgl_indo');
		
	}

	public function index()
	{
		//delete session notif
		// $this->session->unset_userdata('sess_notif');
        // load view 
        $data["rs_data"] = $this->M_jenis_jabatan->get_all();
        $get_last_update = $this->M_jenis_jabatan->get_all();
        if(!empty($get_last_update)){
			$data['last_update'] = $get_last_update[0]['tanggal'];
		}else{
			$data['last_update'] = 'Tidak Ada';

		}
        //  echo"<pre>";print_r($data);die();
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/master/jenis_jabatan/view', $data);
		$this->load->view('admin/dashboard/footer');
        
    }
    
    public function add()
	{
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_jabatan"] = $this->M_jenis_jabatan->get_jabatan();
		$this->load->view('admin/master/jenis_jabatan/add',$data);
		$this->load->view('admin/dashboard/footer');
    }
	
    public function add_process()
	{
		$kode_jabatan = $this->input->post('kode_jabatan', true);
		$nama_jenis_jabatan = $this->input->post('nama_jenis_jabatan', true);
        $status = $this->input->post('status', true);
        
        //set params
        $params = array(
            'kode_jabatan'			=> $kode_jabatan,
			'nama_jenis_jabatan'    => $nama_jenis_jabatan,
            'status'                => $status,
            'tanggal'               => date('Y-m-d')
        );
		
        $this->M_jenis_jabatan->insert('master_jenis_jabatan',$params);
		
		$this->notif_msg('admin/master/jenis_jabatan/', 'Sukses', 'Data berhasil ditambahkan');
        
	}
	
	public function delete($kode_jenis_jabatan)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
        $data["rs_delete"] = $this->M_jenis_jabatan->get_jenis_jabatan_byid($kode_jenis_jabatan);
		$this->load->view('admin/master/jenis_jabatan/delete', $data);
		$this->load->view('admin/dashboard/footer');
        
	}
	
	public function delete_process()
	{
		$kode_jenis_jabatan = $this->input->post('kode_jenis_jabatan', true);
		$where = array(
			'kode_jenis_jabatan'	=> $kode_jenis_jabatan
		);
        $this->M_jenis_jabatan->delete('master_jenis_jabatan',$where);
		
		$this->notif_msg('admin/master/jenis_jabatan', 'Sukses', 'Data berhasil dihapus');
		
    }
	
	public function edit($kode_jenis_jabatan)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_edit"] = $this->M_jenis_jabatan->get_jenis_jabatan_byid($kode_jenis_jabatan);
		$data["rs_jabatan"] = $this->M_jenis_jabatan->get_jabatan();
		$this->load->view('admin/master/jenis_jabatan/edit', $data);
		$this->load->view('admin/dashboard/footer');
        
	}

	public function edit_process()
	{
		$kode_jenis_jabatan = $this->input->post('kode_jenis_jabatan', true);
		$kode_jabatan = $this->input->post('kode_jabatan', true);
		$nama_jenis_jabatan = $this->input->post('nama_jenis_jabatan', true);
		$status = $this->input->post('status', true);
		
		//set params
		$params = array(
			'kode_jabatan'		=> $kode_jabatan,
			'nama_jenis_jabatan'=> $nama_jenis_jabatan,
			'status' 		    => $status
		);
		$where = array(
			'kode_jenis_jabatan'=>$kode_jenis_jabatan
		);
		$this->M_jenis_jabatan->update('master_jenis_jabatan',$params,$where);
		
		$this->notif_msg('admin/master/jenis_jabatan/', 'Sukses', 'Data berhasil diedit');
        
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