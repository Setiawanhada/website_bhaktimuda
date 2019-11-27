<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_welcome extends MY_model {

    public function get_informasi_dashboard(){
        $sql = "SELECT *
        FROM info ORDER BY tanggal DESC LIMIT 8
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

    public function get_informasi(){
        $sql = "SELECT *
        FROM info ORDER BY tanggal DESC
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

    public function get_foto(){
        $sql = "SELECT *
        FROM foto ORDER BY tanggal DESC
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

    public function get_video(){
        $sql = "SELECT *
        FROM video ORDER BY tanggal DESC
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

    public function get_presensi(){
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

    public function get_inti(){
        $sql = "SELECT a.*,b.kode_jabatan,b.nama_jabatan,c.kode_jenis_jabatan,c.nama_jenis_jabatan
        FROM pengurus a
        LEFT JOIN master_jabatan b ON b.kode_jabatan = a.kode_jabatan
        LEFT JOIN master_jenis_jabatan c ON c.kode_jenis_jabatan = a.kode_jenis_jabatan
        WHERE a.kode_jabatan = 4
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
}