<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllDataPendaftaranUserPerorangan()
	{
		return $this->db->select('u.username, count(*) as jumlah, pem.total, pem.bukti_bayar')
			->from('pl_perorangan p')
			->join('user u', 'u.id = p.user_id')
			->join('pem_orang pem', 'pem.user_id = u.id')
			->group_by('p.user_id')
			->get()
			->result_array();
	}

	public function getAllDataPendaftaranPerorangan()
	{
		return $this->db->get('pl_perorangan')->result_array();
  }
  
  public function getAllDataUser()
  {
    return $this->db->get('user')->result_array();
  }

  public function getAllDataPemainPeroranganRapid()
  {
    return $this->db->where('kategori_id', '1')->or_where('kategori_id', '2')->get('pl_perorangan')->result_array();
  }

  public function getAllDataPemainPeroranganBlitz()
  {
    return $this->db->where('kategori_id', '3')->or_where('kategori_id', '4')->get('pl_perorangan')->result_array();
  }

  public function getAllDataReguRapid()
  {
    return $this->db->where('kategori_id', '5')->or_where('kategori_id', '6')->or_where('kategori_id', '7')->get('regu')->result_array();
  }

  public function getAllDataReguBlitz()
  {
    return $this->db->where('kategori_id', '8')->get('regu')->result_array();
  }
}
