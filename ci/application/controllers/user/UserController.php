<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends Master_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function profile($id)
    {
        if(empty($this->session->has_userdata("login")))
        {
            die('User not Exists !');
        }
        $user = $this->User->get_user_profile($id);
        $data = [];
        $data["avatar"]     = $user->avatar;
        $data["first_name"] = $user->first_name;
        $data["last_name"]  = $user->last_name;
        $data["username"]   = $user->username;
        $data["email"]      = $user->email;
        $data["age"]        = $user->age;
        $data["gender"]     = $user->gender;
        $data["created_at"] = $user->created_at;
        $data["updated_at"] = $user->updated_at;

        $this->load->view("master_global/header");
        $this->load->view("user/profile", $data);
        $this->load->view("master_global/footer");
    }
    public function update_user_avatar()
    {
        $msg = [];

        $avatar = $_FILES['avatar'];

        $user_id = $_SESSION['login']['id'];

        $config['upload_path']   = './uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name']     = $avatar['name'];
        $config['overwrite']     = TRUE;
        $config['max_size']      = 1024; // 1MB

        $this->upload->initialize($config);

        $data = $this->upload->data();

        dd($data);

        // $config['max_width']     = '1024';
        // $config['max_height']    = '768';



        //
        // $user = $this->User->update_avatar($avatar, $user_id);
        //
        // if(empty($user))
        // {
        //     $msg["title"] = "Successfully Updated !";
        //     $msg["description"] = "Avatar has been Updated !";
        //     $msg["type"] = "success";
        //     // move_uploaded_file(base_url('assets/images'), $avatar);
        // }
        // else
        // {
        //     $msg["title"] = "Oops Something wrong !";
        //     $msg["description"] = "Please try again !";
        //     $msg["type"] = "error";
        // }
        //
        // echo json_encode($msg);
    }
}
