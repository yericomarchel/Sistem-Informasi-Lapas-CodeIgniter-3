<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Rute default saat membuka website adalah halaman login
$route['default_controller'] = 'welcome';

// Rute untuk autentikasi
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// Rute untuk CRUD Kamar (Admin)
$route['admin/kamar'] = 'admin/kamar/index';
$route['admin/kamar/create'] = 'admin/kamar/create';
$route['admin/kamar/store'] = 'admin/kamar/store';
$route['admin/kamar/edit/(:num)'] = 'admin/kamar/edit/$1';
$route['admin/kamar/update/(:num)'] = 'admin/kamar/update/$1';
$route['admin/kamar/destroy/(:num)'] = 'admin/kamar/destroy/$1';

// Rute untuk CRUD Warga Binaan (Admin)
$route['admin/warga_binaan'] = 'admin/warga_binaan/index';
$route['admin/warga_binaan/create'] = 'admin/warga_binaan/create';
$route['admin/warga_binaan/store'] = 'admin/warga_binaan/store';
$route['admin/warga_binaan/edit/(:num)'] = 'admin/warga_binaan/edit/$1';
$route['admin/warga_binaan/update/(:num)'] = 'admin/warga_binaan/update/$1';
$route['admin/warga_binaan/destroy/(:num)'] = 'admin/warga_binaan/destroy/$1';
$route['admin/dashboard'] = 'admin/dashboard';
// ... rute lainnya ...
$route['admin/verifikasi'] = 'admin/verifikasi/index';
$route['admin/verifikasi/show/(:num)'] = 'admin/verifikasi/show/$1';
$route['admin/verifikasi/approve/(:num)'] = 'admin/verifikasi/approve/$1';
$route['admin/verifikasi/reject/(:num)'] = 'admin/verifikasi/reject/$1';

$route['admin/hari-libur'] = 'admin/hari_libur/index';
$route['admin/hari-libur/store'] = 'admin/hari_libur/store';
$route['admin/hari-libur/destroy/(:num)'] = 'admin/hari_libur/destroy/$1';

$route['admin/laporan'] = 'admin/laporan';
$route['admin/laporan/export'] = 'admin/laporan/export_pdf';

$route['dashboard'] = 'pengunjung/dashboard';
$route['kunjungan/create'] = 'pengunjung/kunjungan/create';
$route['kunjungan/store'] = 'pengunjung/kunjungan/store';
$route['kunjungan/download_pdf/(:num)'] = 'pengunjung/kunjungan/download_pdf/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['akses_ditolak'] = 'auth/akses_ditolak';
