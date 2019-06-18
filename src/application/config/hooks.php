<?php
defined('BASEPATH') or exit('No direct script access allowed');

// for environment hooks
$hook['pre_system'] = function () {
	$dotenv = Dotenv\Dotenv::create(FCPATH);
	$dotenv->overload();
	log_message('INFO', 'Environment successfully loaded');
};