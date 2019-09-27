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
		return $this->db->select('pem.id, u.id as user_id, u.username, count(*) as jumlah, pem.total, pem.bukti_bayar, pem.status_bayar')
			->from('pl_perorangan p')
			->join('user u', 'u.id = p.user_id')
			->join('pem_orang pem', 'pem.user_id = u.id')
      ->group_by('p.user_id')
      ->order_by('p.id', 'asc')
			->get()
			->result_array();
	}

	public function getAllDataPendaftaranPerorangan()
	{
    return $this->db->select('p.nama as nama_pemain, p.nim, p.jenis_kelamin, p.instansi, p.jurusan, p.foto_diri, p.foto_kartu_pelajar, k.nama as nama_kategori')
    ->join('kategori k', 'k.id = p.kategori_id')
    ->order_by('p.id', 'asc')
    ->get('pl_perorangan p')->result_array();
  }  

  public function getAllDataUser()
  {
    return $this->db->get('user')->result_array();
  }

  public function getAllDataPemainPeroranganRapid()
  {
    return $this->db->where('kategori_id', '1')
    ->or_where('kategori_id', '2')
    ->or_where('kategori_id', '13')
    ->or_where('kategori_id', '14')
    ->or_where('kategori_id', '17')
    ->or_where('kategori_id', '18')
    ->get('pl_perorangan')->result_array();
  }

  public function getAllDataPemainPeroranganBlitz()
  {
    return $this->db->where('kategori_id', '3')
    ->or_where('kategori_id', '4')
    ->or_where('kategori_id', '15')
    ->or_where('kategori_id', '16')
    ->or_where('kategori_id', '19')
    ->or_where('kategori_id', '20')
    ->get('pl_perorangan')->result_array();
  }

  public function getAllDataReguRapid()
  {
    return $this->db->where('kategori_id', '5')->or_where('kategori_id', '6')->or_where('kategori_id', '7')->get('regu')->result_array();
  }

  public function getAllDataReguBlitz()
  {
    return $this->db->where('kategori_id', '8')->get('regu')->result_array();
  }

  public function getDataUserUntukEmailByIdPendaftaran($suffix, $uId){
    $this->db->select("u.nama_lengkap, u.username, u.email");
    $this->db->join("user u", "u.id = p.user_id");
    $this->db->from("pem_$suffix p");
    $this->db->where('u.id', $uId);
    return $this->db->get()->row_array();
  }

  public function validasiPembayaranPerorangan($id){
    $this->db->where('user_id', $id);
    $this->db->update('pem_orang', ['status_bayar' => 2]);
    return $this->db->affected_rows() != 0 ? true : false;
  }

  public function getAllDataPendaftaranUserBeregu(){
    return $this->db->select('pem.id, u.id as user_id, u.username, count(*) as jumlah, sum(pem.total) as total, pem.bukti_bayar, pem.status_bayar')
    ->from('regu r')
    ->join('user u', 'u.id = r.user_id')
    ->join('pem_regu pem', 'pem.regu_id = r.id')
    ->group_by('r.user_id')
    ->order_by('r.id', 'asc')
    ->get()
    ->result_array();
  }

  public function getAllDataPendaftaranRegu(){
    return $this->db->select('r.id, r.nama as nama_regu, r.instansi, k.nama as nama_kategori')
    ->join('kategori k', 'k.id = r.kategori_id')
    ->order_by('r.id', 'asc')
    ->get('regu r')->result_array();
  }

  public function getAllDataPendataranPemainRegu(){
    return $this->db->get('pl_beregu')->result_array();
  }

  public function getAllDataPendaftaranOfficialRegu(){
    return $this->db->select('o.regu_id, o.nama as nama_official, o.jenis_kelamin, o.sebagai, o.alergi, k.nama as nama_kategori')
    ->join('kategori k', 'k.id = o.kategori_id')
    ->get('official o')->result_array();
  }

  public function validasiPembayaranBeregu($id){
    $this->db->where('user_id', $id);
    $this->db->update('pem_regu', ['status_bayar' => 2]);
    return $this->db->affected_rows() != 0 ? true : false;
  }
}
