<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends Master_Controller
{

	public function index()
	{
		$this->load->view('master_admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('master_admin/footer');
	}

}
