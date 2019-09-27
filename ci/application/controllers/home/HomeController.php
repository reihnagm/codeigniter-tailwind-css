<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends Master_Controller {

	// RECURSIVE FUNCTION
	public function factory($num)
	{
		if($num == 1)
		{
			return $num;
		}
		else
		{
			return $num * $this->factory($num-1);
		}
	}

	public function index()
	{
		$this->User->get_data();

		// RECURSIVE FUNCTION
		$result = $this->factory(5);
		// die(var_dump($result));
		// EXPECTED OUTPUT : (int) 120
		$this->load->view('home');
	}

}
