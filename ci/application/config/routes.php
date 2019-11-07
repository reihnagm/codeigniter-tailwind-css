<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOGIN
$route['sign-in']['POST'] = 'auth/AuthController/sign_in';

// LOGOUT
$route['sign-out']['POST'] = 'auth/AuthController/sign_out';

// REGISTER
$route['sign-up']['POST'] = 'auth/AuthController/sign_up';

// REGISTER PAGE
$route['sign-up-page']['GET'] = 'auth/AuthController/sign_up_page';

// PROFILE
$route['user/(:any)/profile']['GET'] = 'user/UserController/profile/$1';

// LOGOUT
$route['logout']['POST'] = 'auth/AuthController/logout';

// FORGOT PASSWORD
$route['forgot-password']['GET'] = 'auth/AuthController/forgot_password';

// VERIFY
$route['verify/(:any)/(:any)']['GET'] = 'auth/AuthController/verify/$1/$2';

// ADMINISTRATION
$route['get-regencies']['GET'] = 'user/UserController/get_regencies';
$route['get-districts']['GET'] = 'user/UserController/get_districts';
$route['get-villages']['GET']  = 'user/UserController/get_villages';

// SAVE ADDRESS
$route['save-address']['POST'] = 'user/UserController/save_address';

// PROFILE
$route['profile']['GET'] = 'user/UserController/profile';

// BANNER
$route['update-user-banner']['POST'] = 'user/UserController/update_user_banner';

// AVATAR
$route['update-user-avatar']['POST'] = 'user/UserController/update_user_avatar';

// CHECK RESERVED USERNAME
$route['check-reserved-username']['POST'] = 'auth/AuthController/check_reserved_username';

// CHECK RESERVED EMAIL
$route['check-reserved-email']['POST'] = 'auth/AuthController/check_reserved_email';

// ADMIN
$route['admin']['GET'] = 'admin/AdminController/index';

// ADMIN SETTINGS / CHANGE PASSWORD
$route['admin/change-password']['GET'] = 'admin/AdminController/change_password';

// ADMIN SETTINGS / PRIVILEGES
$route['admin/settings/privilege']['GET'] = 'admin/AdminController/privilege';

// ADMIN SETTINGS / PRIVILEGES
$route['admin/settings/general']['GET'] = 'admin/AdminController/general';

// ADMIN SHOW USER PRIVILEGE
$route['admin/show-privilege-user/(:any)']['GET'] = 'admin/AdminController/show_privilege_user/$1';

// ADMIN ALL USERS DATATABLES
$route['admin/all-user-datatables']['GET'] = 'admin/AdminController/user_datatables';

// ADMIN ALL PRIVILEGE DATATABLES
$route['admin/all-user-privilege-datatables']['GET'] = 'admin/AdminController/user_privilege_datatables';

// ADMIN READ USER
$route['admin/user']['GET'] = 'admin/AdminController/user_read';

// ADMIN EDIT DATATABLES
$route['admin/edit-user-datatables'] = 'admin/AdminController/edit_user_datatables';

// ADMIN DESTROY DATATABLES
$route['admin/destroy-user-datatables'] = 'admin/AdminController/destroy_user_datatables';

// ADMIN UPDATE DATATABLES
$route['admin/update-user-datatables'] = 'admin/AdminController/update_user_datatables';

// ADMIN SAVE PRIVILEGE
$route['admin/save-privilege/(:any)'] = 'admin/AdminController/save_privilege/$1';

// TEST
$route['test'] = 'test/TestController/test';

// TEST SUBMIT
$route['test/submit'] = 'test/TestController/submit';

$route['default_controller'] = 'home/HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
