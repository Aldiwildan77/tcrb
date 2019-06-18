<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email
{
  private $host, $user, $password;

  public function __construct()
  {
    $this->host = $_ENV['MAIL_HOST'];
    $this->user = $_ENV['MAIL_USER'];
    $this->password = $_ENV['MAIL_PASSWORD'];
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
