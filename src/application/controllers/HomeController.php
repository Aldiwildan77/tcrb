<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Turnamen Catur Raja Brawijaya';
        $output['instagram'] = $this->_loadInstagramPhotos();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/home_view', $output);
        $this->load->view('templates/footer');
    }

    private function _loadInstagramPhotos()
    {
        $token = getenv('INSTA_TOKEN'); # token
        $count = 3; # total post

        $curl = curl_init("https://api.instagram.com/v1/users/self/media/recent/?access_token=$token&count=$count");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array('Content-Type: application/json')
        );
        $rawResult = curl_exec($curl);
        $result = json_decode($rawResult, true);
        curl_close($curl);

        $output = [];
        for ($i = 0; $i < $count; $i++) {
            $output += array(
                $i => array(
                    'url' => $result['data'][$i]['images']['low_resolution']['url'],
                    'width' => $result['data'][$i]['images']['low_resolution']['width'],
                    'height' => $result['data'][$i]['images']['low_resolution']['height']
                )
            );
        }

        return $output;
    }
}
