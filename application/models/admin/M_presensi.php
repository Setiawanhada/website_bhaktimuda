<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_presensi extends MY_model {

    public function get_all(){
        $sql = "SELECT a.*,b.jumlah
        FROM presensi a
        INNER JOIN (
        SELECT COUNT(id_anggota) AS jumlah,id_presensi
        FROM presensi_rincian GROUP BY id_presensi) b ON a.id_presensi = b.id_presensi
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
        $sql = "SELECT a.*,b.nama
        FROM presensi_rincian a
        LEFT JOIN anggota b ON b.id_anggota = a.id_anggota
        WHERE id_presensi = ?
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

    public function get_count_rincian_presensi_byid(){
        $sql = "SELECT *, COUNT(id_anggota) AS jumlah
        FROM presensi_rincian GROUP BY id_presensi
        ";
        //execute query
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result['jumlah'];
        }else{
        return array();
        }
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