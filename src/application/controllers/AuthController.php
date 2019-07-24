<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function instagram()
  {
    if (isset($_GET['code'])) {
      $config = $this->_loadInstagramConfig();

      $curl = curl_init('https://api.instagram.com/oauth/access_token');
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $config);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
      $result = curl_exec($curl);
      curl_close($curl);

      echo $result;
    }
  }

  public function authInstagram()
  {
    $url = "https://www.instagram.com/oauth/authorize/?client_id=" . getenv('INSTA_ID') . "&redirect_uri=" . getenv('INSTA_URI') . "&response_type=code";
    redirect($url);
  }

  private function _loadInstagramConfig()
  {
    $config = array(
      'client_id' => getenv('INSTA_ID'),
      'client_secret' => getenv('INSTA_SECRET'),
      'grant_type' => 'authorization_code',
      'redirect_uri' => getenv('INSTA_URI'),
      'code' => $_GET['code']
    );

    return $config;
  }
}
