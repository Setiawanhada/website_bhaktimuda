<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Presensi extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('anggota/M_anggota');

	}

	public function add_presensi_barcode($id_presensi)
	{
		$id_anggota = $this->session->userdata("id_anggota");
		$number = mt_rand(100, 999);
		$prefix = 'RI';
		$generateId = $prefix.$number.date('Ymd');
		//set params
        $params = array(
            'id_rincian'  	=> $generateId,
			'id_presensi'	=> $id_presensi,
            'id_anggota'	=> $id_anggota,
            'tanggal'   	=> now()
		);
		$params_is_exist = array(
			'id_presensi'	=> $id_presensi,
			'id_anggota'	=> $id_anggota
		);
		$cek = $this->M_anggota->is_exist($params_is_exist);
		if($cek == 0){
			$this->M_anggota->insert('presensi_rincian',$params);
		}else{
			echo 'alert("Anda Sudah pre")';
		}
		echo $generateId;
	}
}