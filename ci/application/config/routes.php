<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOGIN
$route['login']['POST'] = 'auth/LoginController/login';

// REGISTER
$route['register']['POST'] = 'auth/RegisterController/register';

// LOGOUT
$route['logout']['POST'] = 'auth/LogoutController/logout';

// ADMIN
$route['admin']['GET'] = 'admin/AdminController/index';

// ADMIN PERMISSIONS / USER
$route['admin/permissions/user']['GET'] = 'admin/AdminController/permissions_user';

// ADMIN SETTINGS / CHANGE PASSWORD
$route['admin/settings/change-password']['GET'] = 'admin/AdminController/change_password';

// ADMIN SETTINGS / PRIVILEGES
$route['admin/settings/privileges']['GET'] = 'admin/AdminController/privileges';


$route['default_controller'] = 'home/HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
