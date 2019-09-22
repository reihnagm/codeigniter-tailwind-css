<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOGIN
$route['login']['POST'] = 'auth/LoginController/login';

// REGISTER
$route['register']['POST'] = 'auth/RegisterController/register';

// LOGOUT
$route['logout']['POST'] = 'auth/LogoutController/logout';

// ADMIN DASHBOARD
$route['admin']['GET'] = 'admin/AdminController/index';

// ADMIN CHANGE PASSWORD
$route['admin/change-password']['GET'] = 'admin/AdminController/change_password';

// ADMIN PRIVILEGES
$route['admin/privileges']['GET'] = 'admin/AdminController/privileges';

// ADMIN SETTING PERMISSIONS
$route['admin/setting/permissions']['GET']= 'admin/AdminController/setting_permissions';

// ADMIN UPDATE SETTING PERMISSIONS
$route['admin/update/setting/permissions/(:num)']['PUT'] = 'admin/AdminController/update_setting_permissions/$1';

// ADMIN DESTROY SETTING PERMISSIONS
$route['admin/destroy/setting/permissions/(:num)']['DELETE'] = 'admin/AdminController/destroy_setting_permissions/$1';

// ADMIN STORE SETTING PERMISSIONS
$route['admin/store/setting/permissions']['POST'] = 'admin/AdminController/store_setting_permissions';

$route['default_controller'] = 'home/HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
