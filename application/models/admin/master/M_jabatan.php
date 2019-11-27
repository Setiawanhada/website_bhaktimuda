<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jabatan extends MY_model {

    public function get_all(){
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

    public function get_jabatan_byid($kode_jabatan){
        $sql = "SELECT *
        FROM master_jabatan 
        WHERE kode_jabatan = ?
        ";
        //execute query
        $query = $this->db->query($sql,$kode_jabatan);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }

}