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

        $user_id = $_SESSION['login']['id'];
        $user_name = $_SESSION['login']['username'];

        // $x = explode('.', $filename); .
        // $extension = strtolower(end($x)); -- png | jpg | jpeg

        $config['upload_path']      = './assets/avatar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['file_name']        = '('.date('y-m-d').')-avatar-'.$user_name;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite']        = TRUE;
        $config['mod_mime_fix']     = TRUE;
        $config['max_size']         = 1024; // 1MB

        $this->upload->initialize($config);

        $data = $this->upload->data();


        dd($data);

        if (!$this->upload->do_upload("avatar"))
        {
            $msg["title"] = "Failed Uploading Avatar !";
            $msg["description"] =  "Oops something went wrong !";
            $msg["type"] = "error";
            $msg["avatar"] = $data["file_name"]; 
        }
        else
        {
            $msg["title"] = "Successfully Uploading Avatar !";
            $msg["description"] = "Your avatar has been changed !";
            $msg["type"] = "success";
        }

        echo json_encode($msg);

        // move_uploaded_file($_FILES['avatar']['tmp_name'], $data['full_path']);

        // dd($data['file_path']);

        // $file_name = $data["file_name"];

        // $user = $this->User->update_avatar($avatar, $user_id);

        // if($this->upload->do_upload($avatar))
        // {
        //     return $this->upload->data("file_name");
        // }

        // if($this->upload->do_upload($file_name))
        // {
        //     dd('test');
        // }

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
