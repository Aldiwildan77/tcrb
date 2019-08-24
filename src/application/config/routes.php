<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Form
$route['form'] = 'ComingSoon/form';
$route['hasil'] = 'ComingSoon/hasilForm';

//Login
$route['masuk'] = 'LoginController';
$route['keluar'] = 'UserController/logout';

//Recovery
$route['lupa-password'] = 'LoginController/forgetPassword';
$route['lupa-password/ganti/(:any)'] = 'LoginController/reset/$1';

//Register
$route['daftar'] = 'LoginController/register';
$route['daftar/aktivasi/(:any)'] = 'LoginController/activate/$1';

//User
$route['user'] = 'UserController';
$route['user/upload'] = 'UserController/upload';
$route['user/edit'] = 'UserController/edit';
$route['user/pendaftaran'] = 'UserController/pendaftaran';
$route['user/pendaftaran-proses-orang'] = 'UserController/prosesPendaftaranPerorangan';
$route['user/pendaftaran-proses-regu'] = 'UserController/prosesPendaftaranBeregu';
$route['user/pembayaran'] = 'UserController/pembayaran';
$route['user/changepass'] = 'UserController/changePassword';

// Home
$route['home'] = 'HomeController';
$route['dokumentasi'] = 'HomeController/dokumentasi';

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

// Admin
$route['admin'] = 'HomeController/adminBayarLogin';
$route['admin/home'] = 'AdminController';
$route['admin/keluar'] = 'AdminController/logout';

$route['default_controller'] = 'HomeController';
$route['404_override'] = 'ErrorController';
$route['javascript-mati'] = 'ErrorController/jsError';
$route['translate_uri_dashes'] = FALSE;
