<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard_admin extends MY_model {
    
    public function get_total_info(){
        $sql = "SELECT COUNT(kode_info) AS jumlah_info
        FROM info
        ";
        //execute query
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result['jumlah_info'];
        }else{
        return array();
        }
    }

    public function get_total_foto(){
        $sql = "SELECT COUNT(kode_foto) AS jumlah_foto
        FROM foto
        ";
        //execute query
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result['jumlah_foto'];
        }else{
        return array();
        }
    }

    public function get_total_video(){
        $sql = "SELECT COUNT(kode_video) AS jumlah_video
        FROM video
        ";
        //execute query
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result['jumlah_video'];
        }else{
        return array();
        }
    }
}