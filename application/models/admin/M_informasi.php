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

    public function get_last_update(){
        $sql = "SELECT *
        FROM info
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
    
    public function generate_info_id($id_file) {
        $sql = "SELECT RIGHT(kode_info, 5) AS last_number
            FROM info
            WHERE LEFT(kode_info, 2) = ? AND SUBSTR(kode_info, 3, 4) = YEAR(NOW())
            AND SUBSTR(kode_info, 7, 2) = MONTH(NOW()) AND SUBSTR(kode_info, 9, 2) = DAY(NOW()) ORDER BY kode_info DESC LIMIT 0,5";
        $query = $this->db->query($sql, $id_file);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            $maks = intval($result['last_number']) + 1;
            if ($maks > 99999) {
                return false;
            }
            return $id_file . date("Ymd") . str_pad($maks, 5, 0, STR_PAD_LEFT);
        } else {
            return $id_file . date("Ymd") . '00001';
        }
    }

    public function insert_informasi($params)
    {
    return $this->db->insert('info', $params);
    }
}