<?php

defined("BASEPATH") OR exit('No direct script access allowed');

class AuthController extends Master_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function sign_in()
    {
        $msg = [];

        $check_login = $this->User->check_login($this->input->post("email"), $this->input->post("password"));

        if($check_login)
        {
            $user = $this->User->get_user('email', $this->input->post('email'));

            $data =
            [
                "id"         => $user["id"],
                "avatar"     => $user["avatar"],
                "first_name" => $user['first_name'],
                "last_name"  => $user['last_name'],
                "username"   => $user["username"],
                "email"      => $user["email"],
                "age"        => $user["age"],
                "gender"     => $user["gender"],
                "created_at" => $user["created_at"],
                "updated_at" => $user["updated_at"]
            ];

            $this->session->set_userdata("login", $data);

            $msg['login'] = TRUE;
            $msg['id'] = $user['id'];
            $msg['username'] = $user['username'];
            $msg['title'] = 'Successfully Login !';
            $msg['desc'] = '';
            $msg['type'] = 'success';
        }
        else
        {
            $msg['login'] = FALSE;
            $msg['title'] = 'Oops !';
            $msg['desc'] = 'Please check your e-mail and password and try again !';
            $msg['type'] = 'error';
        }

        echo json_encode($msg);
    }
    public function sign_up()
    {
        $msg = [];
        $this->User->insert_user();
        $this->send_email_verification($this->input->post('email'), $_SESSION['token']);

        $msg["title"] = "Verify your Account !";
        $msg["desc"] = "Please check your Email to Verify Account !";
        $msg["type"] = "warning";

        echo json_encode($msg);
    }
    public function sign_up_page()
    {
        if($this->session->has_userdata('login'))
        {
            redirect('user/'.$_SESSION['login']['username'].$_SESSION['login']['id'].'/profile');
        }

        $this->load->view("master_global/header");
        $this->load->view("auth/sign_up_page");
        $this->load->view("master_global/footer");
    }
    public function sign_out()
    {
        // OR SESSION_DESTROY()
        $msg = [];
        $this->session->unset_userdata("login");
        $msg["logout"] = TRUE;
        echo json_encode($msg);
    }
    private function send_email_verification($email, $token)
    {
        $this->email->from("reihanagam7@gmail.com", "reihan agam");
        $this->email->to($email);
        $this->email->subject("registration application local");
        $this->email->message("Click Button for Confirmation Regisration
            <a href=".base_url()."verify/$email/$token>Confirmation Email</a>");
        $this->email->set_mailtype('html');
        $this->email->send();
    }
    public function verify($email, $token)
    {
        $msg = [];

        $user = $this->User->get_user('email', $email);

        $data =
        [
            "id"         => $user["id"],
            "avatar"     => $user["avatar"],
            "first_name" => $user['first_name'],
            "last_name"  => $user['last_name'],
            "username"   => $user["username"],
            "email"      => $user["email"],
            "age"        => $user["age"],
            "gender"     => $user["gender"],
            "created_at" => $user["created_at"],
            "updated_at" => $user["updated_at"]
        ];
        $this->session->set_userdata("login", $data);

        if(!$user)
            die('Email not Exists !');

        if($user['token'] !== $token)
            die('Token not Match !');

        $this->User->update_role($user['id'], 1);

        $msg["title"] = "Verified !";
        $msg["description"] = "your Account has been Verified Now !";
        $msg["type"] = "success";

        $this->session->set_flashdata("msg_verified", $msg);

        redirect('user/'.$user['username'].$user['id'].'/profile');
    }
    public function check_reserved_username()
    {
        $msg = [];

        $username = $this->input->post("username");
        $check_reserved_username = $this->User->check_reserved_username($username);

        if($check_reserved_username)
        {
            $msg["title"] = "Username Already Exists !";
            $msg["desc"] = "Please change your Username and Try Again !";
            $msg["type"] = "error";
            $msg["status"] = TRUE;
        }
        else
        {
            $msg["status"] = FALSE;
        }

        echo json_encode($msg);
    }
    public function check_reserved_email()
    {
        $msg = [];

        $email = $this->input->post("email");
        $check_reserved_email = $this->User->check_reserved_email($email);

        if($check_reserved_email)
        {
            $msg["title"] = "Email Already Exists !";
            $msg["desc"] = "Please change your Email and Try Again !";
            $msg["type"] = "error";
            $msg["status"] = TRUE;
        }
        else
        {
            $msg["status"] = FALSE;
        }

        echo json_encode($msg);
    }
    public function check_is_verified_email($email)
    {
        $user = $this->User->get_user('email', $email);
        if($user['is_verified'] == 0)
        {
            return FALSE;
        }

        return TRUE;
    }
}
