<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

$route['default_controller'] = 'ComingSoon';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;