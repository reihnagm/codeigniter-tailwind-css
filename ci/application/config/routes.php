<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*-------------------*/
/*-------AUTH--------*/
/*-------------------*/

// LOGIN
$route['sign-in']['POST'] = 'auth/AuthController/sign_in';

// LOGOUT
$route['sign-out']['POST'] = 'auth/AuthController/sign_out';

// REGISTER
$route['sign-up']['POST'] = 'auth/AuthController/sign_up';

// REGISTER PAGE
$route['sign-up-page']['GET'] = 'auth/AuthController/sign_up_page';

// LOGOUT
$route['logout']['POST'] = 'auth/AuthController/logout';

// FORGOT PASSWORD
$route['forgot-password']['GET'] = 'auth/AuthController/forgot_password';

// VERIFY
$route['verify/(:any)/(:any)']['GET'] = 'auth/AuthController/verify/$1/$2';

// CHECK RESERVED USERNAME
$route['check-reserved-username']['POST'] = 'auth/AuthController/check_reserved_username';

// CHECK RESERVED EMAIL
$route['check-reserved-email']['POST'] = 'auth/AuthController/check_reserved_email';

/*------------------------*/
/*-------AUTH ADMIN-------*/
/*------------------------*/

// LOGIN
$route['admin/sign-in']['POST'] = 'auth/AdminController/sign_in';

// LOGOUT
$route['admin/sign-out']['POST'] = 'auth/AdminController/sign_out';

// FORGOT PASSWORD
$route['admin/forgot-password']['GET'] = 'auth/AuthController/forgot_password';

/*-------------------*/
/*-------USER--------*/
/*-------------------*/

// PROFILE
$route['user/(:any)/profile']['GET'] = 'user/UserController/profile/$1';

/*-----------------*/
/*------ADMIN------*/
/*-----------------*/

// ADMIN
$route['admin']['GET'] = 'admin/AdminController/index';

// ADMIN CHANGE PASSWORD
$route['admin/change-password']['GET'] = 'admin/AdminController/change_password';

// ADMIN USERS DATATABLES
$route['admin/all-user-datatables']['GET'] = 'admin/AdminController/user_datatables';

// ADMIN READ USER DATATABLES
$route['admin/read-user-datatables']['GET'] = 'admin/AdminController/read_user_datatables';

// ADMIN UPDATE USER DATATABLES
$route['admin/update-user-datatables']['POST'] = 'admin/AdminController/update_user_datatables';

// ADMIN EDIT USER DATATABLES
$route['admin/edit-user-datatables']['GET'] = 'admin/AdminController/edit_user_datatables';

// ADMIN DESTROY USER DATATABLES
$route['admin/destroy-user-datatables']['POST'] = 'admin/AdminController/destroy_user_datatables';

/*-------------------*/
/*-----PRIVILEGE-----*/
/*-------------------*/

// ADMIN PRIVILEGE
$route['admin/privilege']['GET'] = 'admin/AdminController/privilege';

// ADMIN USER PRIVILEGE DATATABLES
$route['admin/all-user-privilege-datatables']['GET'] = 'admin/AdminController/user_privilege_datatables';

// ADMIN SHOW USER PRIVILEGE DATATABLES
$route['admin/show-privilege-user/(:any)']['GET'] = 'admin/AdminController/show_privilege_user/$1';

// ADMIN SAVE PRIVILEGE
$route['admin/save-privilege/(:any)']['POST'] = 'admin/AdminController/save_privilege/$1';

/*-------------------------------*/
/*-----ADMIN GENERAL SETTING-----*/
/*-------------------------------*/

// ADMIN GENERAL
$route['admin/general']['GET'] = 'admin/AdminController/general';

/*-------------------*/
/*-----TEST AREA-----*/
/*-------------------*/

// TEST
$route['test'] = 'test/TestController/test';

// TEST SUBMIT
$route['test/submit'] = 'test/TestController/submit';

$route['default_controller'] = 'home/HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*-------------------*/
/*-----OTHER ROUTE---*/
/*-------------------*/

// ADMIN GET SUGGESTION USERNAME
$route['admin/get-suggestion-username']['GET'] = 'admin/AdminController/get_suggestion_username';

// ADMINISTRATION
$route['get-regencies']['GET'] = 'user/UserController/get_regencies';
$route['get-districts']['GET'] = 'user/UserController/get_districts';
$route['get-villages']['GET']  = 'user/UserController/get_villages';

// SAVE ADDRESS
$route['save-address']['POST'] = 'user/UserController/save_address';

// BANNER
$route['update-user-banner']['POST'] = 'user/UserController/update_user_banner';

// AVATAR
$route['update-user-avatar']['POST'] = 'user/UserController/update_user_avatar';

