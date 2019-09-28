<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends Master_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['navigation'] = get_menus_admin();

		$this->load->view('master_admin/header');
		$this->load->view('admin/index', $data);
		$this->load->view('master_admin/footer');
	}

    public function change_password()
    {
        $this->load->view('master_admin/header');
		$this->load->view('admin/change_password');
        $this->load->view('master_admin/footer');
    }

    public function privileges()
    {
        $this->load->view('master_admin/header');
        $this->load->view('admin/privileges');
        $this->load->view('master_admin/footer');
    }

    public function permissions_user()
    {
        $this->load->view('master_admin/header');
        $this->load->view('admin/permissions_user');
        $this->load->view('master_admin/footer');
    }

	public function user_datatables()
	{
		
	}

    public function logout()
    {
        session_destroy();

        redirect('/', 'refresh');
    }

}
