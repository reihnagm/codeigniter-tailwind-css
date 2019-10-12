<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = [];
$autoload['libraries'] = ['database', 'form_validation','ci_dompdf', 'user_agent'];
$autoload['drivers'] = [];
$autoload['helper'] = ['url', 'method_helper', 'string'];
$autoload['config'] = [];
$autoload['language'] = [];
$autoload['model'] = ['User_model'];
