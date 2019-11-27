<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_jabatan extends MY_model {

    public function get_all(){
        $sql = "SELECT a.*,b.kode_jabatan,b.nama_jabatan
        FROM master_jenis_jabatan a
        LEFT JOIN master_jabatan b ON b.kode_jabatan = a.kode_jabatan
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
    
    public function get_jabatan(){
        $sql = "SELECT kode_jabatan,nama_jabatan
        FROM master_jabatan 
        WHERE status = 1
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

    public function get_jenis_jabatan_byid($kode_jenis_jabatan){
        $sql = "SELECT a.*,b.kode_jabatan,b.nama_jabatan
        FROM master_jenis_jabatan a
        LEFT JOIN master_jabatan b ON b.kode_jabatan = a.kode_jabatan
        WHERE a.kode_jenis_jabatan = ?
        ";
        //execute query
        $query = $this->db->query($sql,$kode_jenis_jabatan);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }

}