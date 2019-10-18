<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages']  = [];
$autoload['libraries'] = ['database','email','form_validation','ci_dompdf', 'user_agent'];
$autoload['drivers']   = ['session'];
$autoload['helper']    = ['url', 'method_helper', 'string', 'form'];
$autoload['config']    = [];
$autoload['language']  = [];
$autoload['model']     = ['User_model'];
