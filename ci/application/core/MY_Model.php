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
}
