<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_informasi extends CI_Model {

    public function get_all(){
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
    
    public function get_info_byid($kode_info){
        $sql = "SELECT *
        FROM info WHERE kode_info = ?
        ";
        //execute query
        $query = $this->db->query($sql,$kode_info);
        if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
        }else{
        return array();
        }
    }

    public function insert_informasi($params)
    {
    return $this->db->insert('info', $params);
    }

    public function delete_informasi($kode_info) {
        $sql = "DELETE FROM info WHERE kode_info = ?
        ";
        //execute query
        $query = $this->db->query($sql,$kode_info); 
    }

    public function update_informasi($params) {
        $sql = "UPDATE info SET judul = ?,isi = ?,tanggal = ? WHERE kode_info = ?
        ";
        //execute query
        $query = $this->db->query($sql,$params); 
    }

    public function update_informasi_image($params) {
        $sql = "UPDATE info SET judul = ?,gambar = ?,isi = ?,tanggal = ? WHERE kode_info = ?
        ";
        //execute query
        $query = $this->db->query($sql,$params); 
    }
}