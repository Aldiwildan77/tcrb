<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email
{
  private $host, $user, $password;

  public function __construct()
  {
    $this->host = 'ssl://smtp.googlemail.com';
    $this->user = 'no.reply.tcrb@gmail.com';
    $this->password = 'apayaenaknya123';
  }

  public function getHost()
  {
    return $this->host;
  }
  public function getUser()
  {
    return $this->user;
  }
  public function getPassword()
  {
    return $this->password;
  }
}
