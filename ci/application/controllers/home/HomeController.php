<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends Master_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	// RECURSIVE FUNCTION
	public function factory($num)
	{
		if($num == 1)
			return $num;
		else
			return $num * $this->factory($num-1);
	}
	public function recursive()
	{
		// RECURSIVE FUNCTION
		$result = $this->factory(5);
		// EXPECTED OUTPUT : (int) 120
	}
	public function index()
	{
		$this->load->view('master_global/header');
		$this->load->view('home_page');
		$this->load->view('master_global/footer');
	}
}
