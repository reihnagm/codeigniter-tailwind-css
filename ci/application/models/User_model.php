<?php

class User_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert_user()
    {
        $_SESSION["token"] = random_string("alnum", 18);

        $data =
        [
            'first_name' => $this->input->post("first_name"),
            'last_name' => $this->input->post("last_name"),
            'username' => $this->input->post("username"),
            'email' => $this->input->post("email"),
            'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            'token' => $_SESSION["token"]
        ];

        parent::__insert('tbl_users', $data);
    }
    public function is_logged_in()
    {

    }
}
