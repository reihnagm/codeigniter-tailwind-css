<?php

class User extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_user_profile($id)
    {
        $this->db->from("tbl_users");
        $this->db->where("CONCAT(username,id)", $id);
        return $this->db->get()->row();
    }
    public function insert_user()
    {
        $_SESSION["token"] = random_string("alnum", 18);

        // created_ at gaada
        // updated_at juga

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
    public function get_user($key, $value)
    {
        $query = parent::__get_where('tbl_users', [$key => $value]);

        if(!empty($query->row_array()))
        {
            return $query->row_array();
        }

        return false;
    }
    public function update_role($user_id, $role_id)
    {
        $data = [
            "is_verified" => $role_id
        ];

        $where =
        [
            "id" => $user_id,
        ];

        parent::__update('tbl_users', $where, $data);
    }
    public function check_reserved_username($username)
    {
        $this->db->from("tbl_users");
        $this->db->where("username", $username);
        $user = $this->db->get();

        if($user->num_rows())
        {
            return TRUE;
        }
    }
    public function check_reserved_email($email)
    {
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        $user = $this->db->get();

        if($user->num_rows())
        {
            return TRUE;
        }
    }
    public function check_login($email, $password)
    {
        $input_email = $this->get_user('email', $email)['email'];
        $password_hash = $this->get_user('email', $email)['password'];

        if($input_email == $email && password_verify($password, $password_hash)) return TRUE;
        return FALSE;
    }
}
