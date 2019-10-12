<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOGIN
$route['login']['POST'] = 'auth/AuthController/login';

// REGISTER
$route['register']['POST'] = 'auth/AuthController/register';

// LOGOUT
$route['logout']['POST'] = 'auth/AuthController/logout';

// VERIFY
$route['verify/(:any)/(:any)'] = 'auth/AuthController/$1/$1';

// PROFILE
$route['profile'] = 'user/UserController/profile';

// ADMIN
$route['admin']['GET'] = 'admin/AdminController/index';

// ADMIN SETTINGS / CHANGE PASSWORD
$route['admin/change-password']['GET'] = 'admin/AdminController/change_password';

// ADMIN SETTINGS / PRIVILEGES
$route['admin/privilege']['GET'] = 'admin/AdminController/privilege';

// ADMIN ALL USERS DATATABLES
$route['admin/all-user-datatables']['GET'] = 'admin/AdminController/user_datatables';

// ADMIN READ USER
$route['admin/user']['GET'] = 'admin/AdminController/user_read';

// ADMIN EDIT DATATABLES
$route['admin/edit-user-datatables'] = 'admin/AdminController/edit_user_datatables';

// ADMIN DESTROY DATATABLES
$route['admin/destroy-user-datatables'] = 'admin/AdminController/destroy_user_datatables';

// ADMIN UPDATE DATATABLES
$route['admin/update-user-datatables'] = 'admin/AdminController/update_user_datatables';

// ADMIN SAVE PRIVILEGE
$route['admin/save-privilege'] = 'admin/AdminController/save_privilege';

// TEST
$route['test'] = 'test/TestController/test';

// TEST SUBMIT
$route['test/submit'] = 'test/TestController/submit';

$route['default_controller'] = 'home/HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
