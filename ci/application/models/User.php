<?php

class User extends CI_model
{

    public function get_data()
    {
        $this->db->from('tbl_user');
        return $this->db->get()->result();
    }


}
