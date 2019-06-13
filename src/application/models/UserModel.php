<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDataUser($data){
        return $this->db->get_where('user', $data)->row_array();
    }
}