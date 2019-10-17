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
        if($this->user_model->is_logged_in())
        {
            redirect('profile');
        }
        $user = $this->user_model->get_user('email', $this->input->post('email'));

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged_in'] = true;

        redirect('profile');
    }
    public function logout()
    {
        // OR session_destroy()
        unset($_SESSION['user_id'], $_SESSION['logged_in'] );
        redirect('profile');
    }
    public function sign_up()
    {
        die('test');
        $this->User_model->insert_user();
        $this->send_email_verification($this->input->post('email'), $_SESSION['token']);
    }
    public function sign_up_page()
    {
        $this->load->view("master_global/header");
        $this->load->view("auth/sign_up_page");
        $this->load->view("master_global/footer");
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
        $user = $this->User_model->get_user_based_on_email('email', $email);

        if(!$user)
            die('Email not Exists !');

        if($user['token'] !== $token)
            die('Token not Match !');

        $this->User_model->update_role($user['id'], 1);

        redirect('profile');
    }
    public function check_reserved_username()
    {
        $username = $this->input->post("username");
        $check_reserved_username = $this->User_model->check_reserved_username($username);

        $data = [];

        if($check_reserved_username)
        {
            $data["title"] = "Username Already Exists !";
            $data["desc"] = "Please change your Username and Try Again !";
            $data["type"] = "error";
            $data["status"] = TRUE;
        }
        else
        {
            $data["status"] = FALSE;
        }
        echo json_encode($data);
    }
    public function check_reserved_email()
    {
        $email = $this->input->post("email");
        $check_reserved_email = $this->User_model->check_reserved_email($email);

        $data = [];

        if($check_reserved_email)
        {
            $data["title"] = "Email Already Exists !";
            $data["desc"] = "Please change your Email and Try Again !";
            $data["type"] = "error";
            $data["status"] = TRUE;
        }
        else
        {
            $data["status"] = FALSE;
        }
        echo json_encode($data);
    }
}
