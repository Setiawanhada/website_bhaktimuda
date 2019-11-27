<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_video extends MY_model {

    public function get_all(){
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
    
    public function get_video_byid($kode_video){
        $sql = "SELECT *
        FROM video WHERE kode_video = ?
        ";
        //execute query
        $query = $this->db->query($sql,$kode_video);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }

}