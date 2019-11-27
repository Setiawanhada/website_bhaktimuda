<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pengurus extends MY_model {

    public function get_all(){
        $sql = "SELECT a.*,b.kode_jabatan,b.nama_jabatan,c.kode_jenis_jabatan,c.nama_jenis_jabatan
        FROM pengurus a
        LEFT JOIN master_jabatan b ON b.kode_jabatan = a.kode_jabatan
        LEFT JOIN master_jenis_jabatan c ON c.kode_jenis_jabatan = a.kode_jenis_jabatan
        ORDER BY a.tanggal DESC
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
    
    public function get_pengurus_byid($id_pengurus){
        $sql = "SELECT a.*,b.kode_jabatan,b.nama_jabatan,c.kode_jenis_jabatan,c.nama_jenis_jabatan
        FROM pengurus a
        LEFT JOIN master_jabatan b ON b.kode_jabatan = a.kode_jabatan
        LEFT JOIN master_jenis_jabatan c ON c.kode_jenis_jabatan = a.kode_jenis_jabatan
        WHERE a.id_pengurus = ?
        ";
        //execute query
        $query = $this->db->query($sql,$id_pengurus);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }

    public function get_jabatan(){
        $sql = "SELECT *
        FROM master_jabatan 
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
    public function get_jenis_jabatan(){
        $sql = "SELECT *
        FROM master_jenis_jabatan 
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

    public function get_jenis_jabatan_by_jabatan_id($kode_jabatan){
        $sql = "SELECT *
        FROM master_jenis_jabatan 
        WHERE kode_jabatan = ?
        ";
        //execute query
        $query = $this->db->query($sql,$kode_jabatan);
        if ($query->num_rows() > 0) {
        $result = $query->result_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }
}