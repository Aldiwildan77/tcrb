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
// $route['user/upload'] = 'UserController/upload';
// $route['user/do-upload'] = 'UserController/doUpload';
$route['user/edit'] = 'UserController/edit';
$route['user/pendaftaran'] = 'UserController/pendaftaran';
$route['user/pendaftaran-proses-orang'] = 'UserController/prosesPendaftaranPerorangan';
$route['user/pendaftaran-proses-regu'] = 'UserController/prosesPendaftaranBeregu';
$route['user/pembayaran'] = 'UserController/pembayaran';
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

// Absensi aka registrasi ulang
$route['force-admin'] = 'HomeController/forceAdminLogin';
$route['absensi'] = 'AbsensiController';
$route['absensi/orang/(:any)'] = 'AbsensiController/validateOrangTokenWithPembayaran/$1';
$route['absensi/regu/(:any)'] = 'AbsensiController/validateReguTokenWithPembayaran/$1';


$route['default_controller'] = 'HomeController';
$route['404_override'] = 'ErrorController';
$route['javascript-mati'] = 'ErrorController/jsError';
$route['translate_uri_dashes'] = FALSE;
