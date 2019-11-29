<?php 

class Login_anggota extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');

	}

	function index(){
		$this->load->view('login_anggota');
	}

	function aksi_login(){
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$where = array(
			'username' => $username,
			'password' => $password
            );
        // echo"<pre>";print_r($where);die();
		$cek = $this->M_login->cek_login("anggota",$where)->num_rows();
		if($cek > 0){
            $params = array(
                'username'  => $username,
                'password'  => $password
            );
            $data_anggota = $this->M_login->get_data_anggota($params);

			$data_session = array(
                'id_anggota'    => $data_anggota['id_anggota'],
				'nama'          => $data_anggota['nama'],
				'status'        => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("anggota/dashboard_anggota"));

		}else{
			
			redirect(base_url("login_anggota"));
			
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('welcome'));
	}
}