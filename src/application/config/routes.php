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
$route['daftar/kirim-email'] = 'LoginController/reSendEmailActivation';

//User
$route['user'] = 'UserController';
$route['user/upload'] = 'UserController/upload';
// $route['user/bayar'] = 'UserController/uploadBuktiPembayaran';
$route['user/edit'] = 'UserController/edit';
$route['user/pendaftaran'] = 'UserController/pendaftaran';
$route['user/pendaftaran-proses-orang'] = 'UserController/prosesPendaftaranPerorangan';
$route['user/pendaftaran-proses-regu'] = 'UserController/prosesPendaftaranBeregu';
$route['user/pembayaran'] = 'UserController/pembayaran';
$route['user/changepass'] = 'UserController/changePassword';
$route['user/bukti-pendaftaran'] = 'UserController/halamanGeneratePDF';
// $route['user/bukti-pendaftaran'] = 'UserController/generatePDF';
// $route['generate-qr/(:any)/(:any)'] = 'UserController/generateQrCode/$1/$2';
$route['generate-qr'] = 'UserController/generateQrCode';

// Home
$route['home'] = 'HomeController';
$route['dokumentasi'] = 'HomeController/dokumentasi';
$route['tata-cara-pendaftaran'] = 'HomeController/tataCara';
$route['twibbon'] = 'HomeController/twibbon';
$route['twibbon-manual'] = 'HomeController/twibbonManual';

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
$route['admin/jumlah-pendaftar'] = 'HomeController/lihatJumlahPendaftar';
$route['admin/home'] = 'AdminController';
$route['admin/orang'] = 'AdminController/perorangan';
$route['admin/orang/semua'] = 'AdminController/peroranganSemua';
$route['admin/orang/0'] = 'AdminController/perorangan0';
$route['admin/orang/1'] = 'AdminController/perorangan1';
$route['admin/orang/2'] = 'AdminController/perorangan2';
$route['admin/orang/pemain-rapid'] = 'AdminController/pemainRapid';
$route['admin/orang/pemain-blitz'] = 'AdminController/pemainBlitz';
$route['admin/regu'] = 'AdminController/beregu';
$route['admin/regu/semua'] = 'AdminController/bereguSemua';
$route['admin/user'] = 'AdminController/user';
$route['admin/validasi/orang/(:any)'] = 'AdminController/validasiPembayaranPerorangan/$1';
$route['admin/validasi/regu/(:any)'] = 'AdminController/validasiPembayaranBeregu/$1';
$route['admin/keluar'] = 'AdminController/logout';

$route['default_controller'] = 'HomeController';
$route['404_override'] = 'ErrorController';
$route['javascript-mati'] = 'ErrorController/jsError';
$route['translate_uri_dashes'] = FALSE;
