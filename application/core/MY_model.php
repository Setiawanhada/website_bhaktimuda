<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_model extends CI_Model {
    public function update($table,$params,$where)
    {
        $this->db->set($params);
        $this->db->where($where);
        return $this->db->update($table);
    }
    public function delete($table,$where)
    {
        
        $this->db->where($where);
        return $this->db->delete($table);
    }
    public function insert($table,$params)
    {
        
        
        return $this->db->insert($table,$params);
    }

}