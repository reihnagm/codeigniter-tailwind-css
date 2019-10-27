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
        $provinces = provinces();

        if(empty($this->session->has_userdata("login")))
        {
            redirect('/');
        }
        $user = $this->User->get_user_profile($id);
        $data = [];
        $data["banner"]     = $user->banner;
        $data["avatar"]     = $user->avatar;
        $data["first_name"] = $user->first_name;
        $data["last_name"]  = $user->last_name;
        $data["username"]   = $user->username;
        $data["email"]      = $user->email;
        $data["age"]        = $user->age;
        $data["gender"]     = $user->gender;
        $data["created_at"] = $user->created_at;
        $data["updated_at"] = $user->updated_at;
        $data["provinces"]  = $provinces;

        $this->load->view("master_global/header");
        $this->load->view("user/profile", $data);
        $this->load->view("master_global/footer");
    }
    public function update_user_avatar()
    {
        $msg = [];

        $user_id = $_SESSION['login']['id'];
        $user_name = $_SESSION['login']['username'];

        $filename = $_FILES['avatar']['name'];

        $x = explode('.', $filename);
        $extension = strtolower(end($x)); // png | jpg | jpeg

        $config['upload_path']      = './assets/avatar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['file_name']        = 'avatar-'.$user_name;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite']        = TRUE;
        $config['mod_mime_fix']     = TRUE;
        $config['max_size']         = 1024; // 1MB

        $this->upload->initialize($config);

        $data = $this->upload->data();

        if (!$this->upload->do_upload("avatar"))
        {
            $msg["title"] = "Failed Uploading Avatar !";
            $msg["description"] = $this->upload->display_errors();
            $msg["type"] = "error";
        }
        else
        {
            $msg["title"] = "Successfully Uploading Avatar !";
            $msg["description"] = "Your avatar has been changed !";
            $msg["type"] = "success";
            $msg["avatar"] = $data["file_name"].'.'.$extension;

            // UPDATE AVATAR TO DATABASE
            $this->User->update_avatar($data["file_name"].'.'.$extension, $user_id);
        }

        echo json_encode($msg);
    }
}
