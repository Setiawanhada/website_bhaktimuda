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
        // load view 
        $data["rs_data"] = $this->M_presensi->get_all();
        $get_last_update = $this->M_presensi->get_all();
        if(!empty($get_last_update)){
			$data['last_update'] = $get_last_update[0]['tanggal'];
		}else{
			$data['last_update'] = 'Tidak Ada';

		}
		$data["rs_jml"] = $this->M_presensi->get_count_rincian_presensi_byid();
		// print_r($jml);die();
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$this->load->view('admin/presensi/view', $data);
		$this->load->view('admin/dashboard/footer');
        
    }
	
	public function presensi_barcode($generateId)
	{
		// load view            
        $img = $generateId.'.png';
		$qrcode = $this->_code($generateId);
		
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		
		$data["rs_data"] = $this->M_presensi->get_presensi_byid($generateId);
		$data['rs_img'] = $img;
		$this->load->view('admin/presensi/barcode', $data);
		$this->load->view('admin/dashboard/footer');
	}
	
	public function presensi_manual()
	{
		$id_presensi = $this->input->post('id_presensi', true);
		$id_anggota = $this->input->post('id_anggota',true);

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
		$cek = $this->M_presensi->is_exist($params_is_exist);
		if($cek == '0'){
			$this->M_presensi->insert('presensi_rincian',$params);
		}else{
			// redirect('admin/presensi/presensi_barcode/'.$id_presensi.'');
			echo "<script>alert('Gagal di tambahkan!');</script>";
		}

		redirect('admin/presensi/presensi_barcode/'.$id_presensi.'');
    }
	
	public function tabel_rincian_presensi_barcode($id_presensi)
	{
		$data = $this->M_presensi->get_rincian_presensi_byid($id_presensi);
		// load view 
		$no=1;
		$html = '';

		$html .= '<table class="table table-responsive table-striped"';
		$html .= '<thead>';
			$html .= '<th>No</th>';
			$html .= '<th>Nama Anggota</th>';
			$html .= '<th>Waktu Presensi</th>';
			$html .= '<th>Aksi</th>';
		$html .= '</thead>';
        foreach ($data as $value) {
			$html .= '<tr>';
			 $html .= '<td>'.$no.'</td>';
			 $html .= '<td>'.$value['nama'].'</td>';
			 $html .= '<td>'.$value['tanggal'].'</td>';
			 $html .= '<td><a href="'.base_url('admin/presensi/delete_rincian_presensi/'.$value['id_presensi'].'/'.$value['id_rincian']).'"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a>'.'</td>';
			 $html .= '</tr>';
			$no++;
		  }
		  $html .= '</table>';  
		echo $html ;
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
        
		$number = mt_rand(100, 999);
		$prefix = 'PR';
		$generateId = $prefix.$number.date('Ymd');
        //set params
        $params = array(
            'id_presensi'   => $generateId,
			'bulan'     => $bulan,
			'tahun'		=> $tahun,
            'tanggal'   => date('Y-m-d')
        );
		$this->M_presensi->insert('presensi',$params);
		// generate code

		redirect('admin/presensi/presensi_barcode/'.$generateId);
        
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
	
	public function delete_rincian_presensi($id_presensi,$id_rincian)
	{
		$where = array(
			'id_rincian'	=> $id_rincian
		);
        $this->M_presensi->delete('presensi_rincian',$where);
		
		redirect('admin/presensi/presensi_barcode/'.$id_presensi);
		
    }
	
	public function edit($id_presensi)
	{
		//delete session notif
		$this->session->unset_userdata('sess_notif');
        // load view
		$this->load->view('admin/dashboard/head');
		$this->load->view('admin/dashboard/sidebar');
		$data["rs_edit"] = $this->M_presensi->get_presensi_byid($id_presensi);
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
			'tahun'   	=> $tahun
		);
		$where = array(
			'id_presensi'=>$id_presensi
		);
		$this->M_presensi->update('presensi',$params,$where);
		
		$this->notif_msg('admin/presensi/view', 'Sukses', 'Data berhasil diedit');
        
	}

	function _code($id)
    {
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './cache/'; //string, the default is application/cache/
        $config['errorlog']     = './cache/'; //string, the default is application/logs/
        $config['imagedir']     = './cache/'; //direktori penyimpanan qr code
        $config['quality']      =  true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $id; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }
    
	
}