<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public function notif_msg($content, $tipe, $pesan)
	{
		if (!empty($tipe) && !empty($pesan)) {
			if ($tipe == 'Sukses') {
				// $this->session->unset_userdata('success');
				$this->session->set_flashdata('success', $pesan);
				// print_r($content);die();
				redirect($content);
			}else{
				// $this->session->unset_userdata('error');
				$this->session->set_flashdata('error', $pesan);
				// // print_r($content);die();
				redirect($content);
			}
		}
    }
}