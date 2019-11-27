<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengurus extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/M_pengurus");
		$this->load->helper('tgl_indo');
		
	}

	public function view()
	{
		//delete session notif
		// $this->session->unset_userdata('sess_notif');
        // load view 
        $data["rs_data"] = $this->M_pengurus->get_all();
        $get_last_update = $this->M_pengurus->get_all();
        if(!empty($get_last_update)){
			$data['last_update'] = $get_last_update[0]['tanggal'];
		}else{
			$data['last_update'] = 'Tidak Ada';

		}
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/pengurus/view', $data);
		$this->load->view('admin/dashboard/footer');
        
    }
    
    public function add()
	{
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data['rs_jabatan'] = $this->M_pengurus->get_jabatan();
		$this->load->view('admin/pengurus/add', $data);
		$this->load->view('admin/dashboard/footer');
    }
	
	public function get_jenis_jabatan($kode_jabatan)
    {
        $kode_jabatan = urldecode($kode_jabatan);
        $data = $this->M_pengurus->get_jenis_jabatan_by_jabatan_id($kode_jabatan);
        $json = json_encode($data);
        print_r($json);die();
        return $json;
	}
	
    public function add_process()
	{
		$kode_jabatan = $this->input->post('kode_jabatan', true);
		$kode_jenis_jabatan = $this->input->post('kode_jenis_jabatan', true);
        $nama = $this->input->post('nama', true);
        $status = $this->input->post('status', true);
        
		$number = mt_rand(100, 999);
		$prefix = 'PE';
		$generateId = $prefix.$number.date('Ymd');
		$fileExt = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
		$gambar = $generateId.'.'.$fileExt;
		if(!empty($_FILES["gambar"]["name"])){
			//set params
			$params = array(
				'id_pengurus' => $generateId,
				'kode_jabatan' => $kode_jabatan,
				'kode_jenis_jabatan'=> $kode_jenis_jabatan,
				'nama'				=> $nama,
				'gambar'	=> $gambar,
				'status'   => $status,
				'tanggal'   => date('Y-m-d')
			);
			
		$this->_uploadImage($generateId);
		}
		else{
			//set params
			$params = array(
				'id_pengurus' => $generateId,
				'kode_jabatan' => $kode_jabatan,
				'kode_jenis_jabatan'=> $kode_jenis_jabatan,
				'nama'				=> $nama,
				'status'   => $status,
				'tanggal'   => date('Y-m-d')
			);
		}
		
        $this->M_pengurus->insert('pengurus',$params);
		
		$this->notif_msg('admin/pengurus/add', 'Sukses', 'Data berhasil ditambahkan');
        
	}
	
	public function delete($id_pengurus)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
        $data["rs_delete"] = $this->M_pengurus->get_pengurus_byid($id_pengurus);
		$this->load->view('admin/pengurus/delete', $data);
		$this->load->view('admin/dashboard/footer');
        
	}
	
	public function delete_process()
	{
		$id_pengurus = $this->input->post('id_pengurus', true);
		$this->_deleteImage($id_pengurus);
		$where = array(
			'id_pengurus'	=> $id_pengurus
		);
        $this->M_pengurus->delete('pengurus',$where);
		
		$this->notif_msg('admin/pengurus/view', 'Sukses', 'Data berhasil dihapus');
		
    }
	
	public function edit($id_pengurus)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_edit"] = $this->M_pengurus->get_pengurus_byid($id_pengurus);
		$data['rs_jabatan'] = $this->M_pengurus->get_jabatan();
		$data['rs_jenis_jabatan'] = $this->M_pengurus->get_jenis_jabatan();
		// echo"<pre>";print_r($data);die();
		$this->load->view('admin/pengurus/edit', $data);
		$this->load->view('admin/dashboard/footer');
        
	}

	public function edit_process()
	{
		$id_pengurus = $this->input->post('id_pengurus', true);
		$kode_jabatan = $this->input->post('kode_jabatan', true);
		$kode_jenis_jabatan = $this->input->post('kode_jenis_jabatan', true);
        $nama = $this->input->post('nama', true);
        $status = $this->input->post('status', true);
		
		if(!empty($_FILES["gambar"]["name"])){
			//delete old image
			$this->_deleteImage($id_pengurus);
			//insert new image
			$this->_uploadImage($id_pengurus);
			$fileExt = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
			$gambar = $id_pengurus.'.'.$fileExt;
			//set params
			$params = array(
				'kode_jabatan' => $kode_jabatan,
				'kode_jenis_jabatan'=> $kode_jenis_jabatan,
				'nama'				=> $nama,
				'gambar'	=> $gambar,
				'status'   => $status,
				'tanggal'   => date('Y-m-d')
			);
			$where = array(
				'id_pengurus'	=> $id_pengurus
			);
		}
		else{
			//set params
			$params = array(
				'kode_jabatan' => $kode_jabatan,
				'kode_jenis_jabatan'=> $kode_jenis_jabatan,
				'nama'				=> $nama,
				'status'   => $status,
				'tanggal'   => date('Y-m-d')
			);
			$where = array(
				'id_pengurus'	=> $id_pengurus
			);
		}
		// echo"<pre>";print_r($where);die();
		$this->M_pengurus->update('pengurus',$params,$where);
		$this->notif_msg('admin/pengurus/view', 'Sukses', 'Data berhasil diedit');
        
	}

	private function _deleteImage($id_pengurus)
	{
		$pengurus = $this->M_pengurus->get_pengurus_byid($id_pengurus);
		// echo"<pre>";print_r($info);die();
		if ($pengurus['gambar'] != "default.jpg") {
			$filename = explode(".", $pengurus['gambar'])[0];
			return array_map('unlink', glob(FCPATH."upload/pengurus/$filename.*"));
		}
	}
	
    private function _uploadImage($id_pengurus)
	{
		$config['upload_path']          = './upload/pengurus/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $id_pengurus;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
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