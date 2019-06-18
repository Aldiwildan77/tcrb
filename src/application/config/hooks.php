<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// for environment hooks
$hook['pre_system'] = function() {
  $dotenv = Dotenv\Dotenv::create(FCPATH);
  $dotenv->load();
};