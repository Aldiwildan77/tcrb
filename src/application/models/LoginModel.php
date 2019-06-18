<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();        
    }

    public function insertData($data)
    {
        $this->db->insert('user', $data);
    }

    public function updateData($where, $update)
    {
        $this->db->where($where);
        $this->db->update('user', $update);
    }

    public function checkActivationCode($data)
    {
        $result = $this->db->get_where('user', $data);
        return $result -> num_rows() > 0 ? true : false;
    }

    public function checkStatusAktif($data)
    {
        $result = $this->db->get_where('user', $data)->row_array();
        return $result['status_aktif'] == 1 ? true : false;
    }

    public function login($data)
    {
        $user = $data['user'];
        $password = $data['password'];

        $this->db->group_start();
        $this->db->where('username' , $user);
        $this->db->or_where('email', $user);
        $this->db->group_end();

        $this->db->where('password',$password);
        return $this->db->get('user')->row_array();
    }

    public function recovery($data)
    {
        $where = "username='{$data}' OR email='{$data}' ";
        return $this->db->get_where('user', $where)->row_array();
    }

    public function setRecoveryCode($code)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime('+30 minutes');
        $dateFormated = $date->format('Y-m-d H:i:s');
        $data = [
            'recovery_code' => $code,
            'expired' => $dateFormated
        ];

        $cek = $this->db->get_where('recovery', ['recovery_code' => $code])->row_array();
        if($cek){
            $this->db->where(['recovery_code' => $code]);
            $this->db->update('recovery', ['expired' => $dateFormated]);
        } else {
            $this->db->insert('recovery', $data);
        }
    }

    public function verifyRecoveryCode($code)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime();
        $dateFormated = $date->format('Y-m-d H:i:s');
        $allUser = $this->db->get('user')->result_array();
        $expired = $this->db->get_where('recovery', ['recovery_code' => $code])->row_array()['expired'];

        foreach ($allUser as $row){
            $check = md5('resettcrbbcc'.$row['password']);
            if($check == $code && ($expired > $dateFormated)){
                return $row;
            }
        }
        return null;
    }

    public function updatePassword($data)
    {
        $this->db->delete('recovery', ['recovery_code' => $data['recoveryCode']]);
        $this->db->where(['username' => $data['username']]);
        $result = $this->db->update('user', ['password' => $data['password']]);
        return $this->db->affected_rows != 0 ? true : false;
    }
}