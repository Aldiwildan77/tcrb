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
        $data['title'] = 'Home';
        $output['instagram'] = $this->_loadInstagramPhotos();

        $this->load->view('templates/header', $data);
        $this->load->view('home/home_view', $output);
        $this->load->view('templates/footer');
    }

    private function _loadInstagramPhotos()
    {
        $token = getenv('INSTA_TOKEN'); # token
        $count = 9; # total post

        $rawResult = file_get_contents("https://api.instagram.com/v1/users/self/media/recent/?access_token=$token&count=$count");
        $result = json_decode($rawResult, true);

        // print_r($result);
        // return;

        $output = [];
        for ($i = 0; $i < $count; $i++) {
            $output += array(
                $i => array(
                    // 'url' => $result['data'][$i]['images']['low_resolution']['url'],
                    'url'       => $result['data'][$i]['images']['standard_resolution']['url'],
                    'width'     => $result['data'][$i]['images']['low_resolution']['width'],
                    'height'    => $result['data'][$i]['images']['low_resolution']['height'],
                    'nomer'     => $i,
                    'link'      => $result['data'][$i]['link'],
                    'caption'   => $result['data'][$i]['caption']['text']
                )
            );
        }

        return $output;
    }

    function dokumentasi()
    {
        $data['title'] = 'Dokumentasi';

        $this->load->view('templates/header', $data);
        $this->load->view('home/dokumentasi_view');
        $this->load->view('templates/footer');
    }

    function line()
    {
        redirect('https://line.me/R/ti/p/@trm9176m');
    }
    function email()
    {
        redirect('');
    }
    function instagram()
    {
        redirect('https://www.instagram.com/tcrb_ub/');
    }
    function youtube()
    {
        redirect('https://www.youtube.com/channel/UCq-pgI0KWAISOnfwG-YkOFQ');
    }
}
