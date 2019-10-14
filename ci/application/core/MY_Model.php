<?php

class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function __insert($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function __get_where($table, $data = [])
    {
        return $this->db->get_where($table, $data);
    }
    public function __update($table, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
