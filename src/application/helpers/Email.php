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
	// lek butuh contruct baru monggo ;v

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

	public function getConfig()
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => $this->getHost(),
			'smtp_user' => $this->getUser(),
			'smtp_pass' => $this->getPassword(),
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		return $config;
	}
}
