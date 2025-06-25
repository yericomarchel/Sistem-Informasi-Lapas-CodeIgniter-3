<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ... (kode lain di atasnya) ...

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'session', 'form_validation');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('User_model', 'Kamar_model', 'Warga_binaan_model', 'Kunjungan_model', 'Hari_libur_model');
