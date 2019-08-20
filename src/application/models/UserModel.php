<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getDataUser($data)
	{
		return $this->db->get_where('user', $data)->row_array();
	}

	public function editProfile($data)
	{
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->update('user', $data);
	}

	public function getDataPembayaran($suffix, $data)
	{
		return $this->db->get_where("pem_$suffix", $data)->row_array();
	}

	public function checkPembayaranOrang($username)
	{
		$this->db->select('*');
		$this->db->from('user u');
		$this->db->join('pem_orang po', 'po.user_id = u.id');
		$this->db->where('u.username', $username);
		return $this->db->get()->num_rows() > 0 ? true : false;
	}

	public function checkPembayaranRegu($username)
	{
		$this->db->select('*');
		$this->db->from('user u');
		$this->db->join('pem_regu pr', 'pr.user_id = u.id');
		$this->db->where('u.username', $username);
		return $this->db->get()->num_rows() > 0 ? true : false;
	}

	public function getDataPembayaranWithRegu($token)
	{
		$this->db->select('*');
		$this->db->from('pem_regu pr');
		$this->db->join('regu r', 'pr.regu_id = r.id');
		$this->db->where('pr.token', $token);
		return $this->db->get()->row_array();
	}

	public function insertRegu($data)
	{
		$this->db->insert_batch('regu', $data);
	}

	public function insertOfficial($data)
	{
		for ($i = 0; $i < sizeof($data); $i++) {
			$this->db->insert_batch('official', $data[$i]);
		}
	}

	public function insertPemainRegu($data)
	{
		for ($i = 0; $i < sizeof($data); $i++) {
			$this->db->insert_batch('pl_beregu', $data[$i]);
		}
	}

	public function getReguData()
	{
		$this->db->select('id');
		$this->db->from('regu');
		$this->db->where('user_id', $this->session->userdata('id'));
		$this->db->order_by('id', 'ASC');
		return $this->db->get()->result_array();
	}
}
