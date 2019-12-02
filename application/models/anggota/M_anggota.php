<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends MY_model {

    public function index(Type $var = null)
    {
        # code...
    }

    public function is_exist($params_is_exist){
        $sql = "SELECT COUNT(id_anggota) AS jumlah
        FROM presensi_rincian 
        WHERE id_presensi = ? AND id_anggota = ?
        ";
        //execute query
        $query = $this->db->query($sql,$params_is_exist);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result['jumlah'];
        }else{
        return array();
        }
    }
}