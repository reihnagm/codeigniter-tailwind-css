<?php

class User_model extends CI_model
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
            'email' => $this->input->post("email"),
            'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            'token' => $_SESSION["token"]
        ];

        parent::__insert($data);
    }
    public function is_logged_in()
    {

    }
}
