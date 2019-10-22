<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends Master_Controller
{
    public function test()
    {
        $date = Date('Y/m/d');

        dd($date);

        $this->load->view('test/test.php');
    }

    public function submit()
    {
        dd($_REQUEST);
    }
}
