<?php

defined("BASEPATH") OR exit('No direct script access allowed');

class AuthController extends Master_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        session_start();
    }
    public function logout()
    {
        session_destroy();
    }
    public function register()
    {
        
    }
}
