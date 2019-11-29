<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_presensi extends MY_model {

    public function get_all(){
        $sql = "SELECT *
        FROM presensi ORDER BY tanggal DESC
        ";
        //execute query
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        $result = $query->result_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }
    
    public function get_presensi_byid($id_presensi){
        $sql = "SELECT *
        FROM presensi WHERE id_presensi = ?
        ";
        //execute query
        $query = $this->db->query($sql,$id_presensi);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }

    public function get_rincian_presensi_byid($id_presensi){
        $sql = "SELECT *
        FROM presensi_rincian WHERE id_presensi = ?
        ";
        //execute query
        $query = $this->db->query($sql,$id_presensi);
        if ($query->num_rows() > 0) {
        $result = $query->result_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }

    public function get_count_rincian_presensi_byid($id_presensi){
        $sql = "SELECT COUNT(id_anggota) AS jumlah
        FROM presensi_rincian WHERE id_presensi = ?
        ";
        //execute query
        $query = $this->db->query($sql,$id_presensi);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result['jumlah'];
        }else{
        return array();
        }
    }
}