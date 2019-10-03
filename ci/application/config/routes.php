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

// ADMIN SETTINGS / CHANGE PASSWORD
$route['admin/change-password']['GET'] = 'admin/AdminController/change_password';

// ADMIN SETTINGS / PRIVILEGES
$route['admin/privileges']['GET'] = 'admin/AdminController/privileges';

// ADMIN ALL USERS DATATABLES
$route['admin/all-user-datatables']['GET'] = 'admin/AdminController/user_datatables';

// ADMIN EDIT DATATABLES
$route['admin/edit-user-datatables'] = 'admin/AdminController/edit_user_datatables';

// ADMIN UPDATE DATATABLES
$route['admin/update-user-datatables'] = 'admin/AdminController/update_user_datatables';

$route['default_controller'] = 'home/HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
