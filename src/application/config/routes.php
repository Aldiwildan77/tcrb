<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Form
$route['form'] = 'ComingSoon/form';
$route['hasil'] = 'ComingSoon/hasilForm';

//Login
$route['login'] = 'LoginController';
$route['logout'] = 'UserController/logout';

//Recovery
$route['recovery'] = 'LoginController/forgetPassword';
$route['recovery/reset/(:any)'] = 'LoginController/reset/$1';

//Register
$route['register'] = 'LoginController/register';
$route['activate/(:any)'] = 'LoginController/activate/$1';

//User
$route['user'] = 'UserController';
$route['user/upload'] = 'UserController/upload';
$route['user/do-upload'] = 'UserController/doUpload';
$route['user/edit'] = 'UserController/edit';
$route['user/do-edit'] = 'UserController/doEdit';
$route['user/changepass'] = 'UserController/changePassword';

// Home
$route['home'] = 'HomeController';
$route['dokumentasi'] = 'HomeController/dokumentasi';

// Auth
$route['auth'] = 'AuthController';
$route['auth/instagram'] = 'AuthController/instagram';
$route['auth/generate'] = 'AuthController/authInstagram';

// Sosmed
$route['line'] = 'HomeController/line';
$route['youtube'] = 'HomeController/youtube';
$route['email'] = 'HomeController/email';
$route['instagram'] = 'HomeController/instagram';

$route['default_controller'] = 'HomeController';
$route['404_override'] = 'ErrorController';
$route['translate_uri_dashes'] = FALSE;
