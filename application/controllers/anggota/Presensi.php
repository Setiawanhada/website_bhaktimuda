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
		
        $this->M_anggota->insert('presensi_rincian',$params);
		echo $generateId;
	}
}