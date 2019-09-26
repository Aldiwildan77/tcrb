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

  public function getAllKategori()
  {
    return $this->db->get('kategori')->result_array();
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

	public function getDataPembayaranWithPerorangan($token)
	{
		$this->db->select('*');
		$this->db->from('pem_orang po');
		$this->db->join('user u', 'u.id = po.user_id');
		$this->db->where('po.token', $token);
		return $this->db->get()->row_array();
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

  public function checkUserPemain($id)
  {
    return $this->db->get_where('pl_perorangan', ['user_id' => $id])->result_array();
  }

  public function getPemainIDbyUserID($id){
    return $this->db->select('id')->get_where('pl_perorangan', ['user_id' => $id])->result_array();
  }

  public function updatePerorangan($data)
  {
    $this->db->update_batch('pl_perorangan', $data, 'id');
  }

  public function checkUserRegu($id){
    return $this->db->get_where('regu', ['user_id' => $id])->result_array();
  }

  public function getReguIDbyUserID($id){
    return $this->db->select('id')->get_where('regu', ['user_id' => $id])->result_array();
  }

  public function getPemainReguIDbyUserID($id)
  {
    return $this->db->get_where('pl_beregu', ['user_id' => $id])->result_array();
  }

  public function getOfficialIDbyUserID($id)
  {
    return $this->db->select('o.id')
                    ->join('regu r', 'r.id = o.regu_id')
                    ->where('r.user_id', $id)
                    ->get('official o')->result_array();
  }

  public function updateRegu($data)
  {
    $this->db->update_batch('regu', $data, 'id');
  }

  public function updatePemainRegu($data)
  {
    $this->db->update_batch('pl_beregu', $data, 'id');
  }

  public function updateOfficial($data)
  {
    $this->db->update_batch('official', $data, 'id');
  }

  // update regu
  // update official
  // update pemain regu

	public function getReguData()
	{
		$this->db->select('id');
		$this->db->from('regu');
		$this->db->where('user_id', $this->session->userdata('id'));
		$this->db->order_by('id', 'ASC');
		return $this->db->get()->result_array();
	}

	public function getOfficialData()
	{
		$this->db->select('o.*');
		$this->db->from('regu r');
		$this->db->join('user u', 'r.user_id = u.id');
    $this->db->join('official o', 'o.regu_id = r.id');
    $this->db->group_by('o.official_group');
		$this->db->where('u.id', $this->session->userdata('id'));
		return $this->db->get()->result_array();
	}

	public function insertPembayaranRegu($data)
	{
		$this->db->insert('pem_regu', $data);
	}

	public function getTotalHargaBeregu($reguId, $officialId)
	{
		$kategoriReguId = $this->getKategoriIdFromRegu($reguId);
		$kategoriOfficialId = $this->getKategoriIdFromOfficial($officialId);

		$this->db->select('SUM(k.harga) AS harga');
		$this->db->from('kategori k');
		$this->db->where_in('k.id', array($kategoriReguId['kategori_id'], $kategoriOfficialId['kategori_id']));
		return $this->db->get()->row_array();
	}

	public function getKategoriIdFromRegu($reguId)
	{
		$this->db->select('kategori_id');
		$this->db->from('regu');
		$this->db->where('id', $reguId);
		return $this->db->get()->row_array();
	}

	public function getKategoriIdFromOfficial($officialId)
	{
		$this->db->select('kategori_id');
		$this->db->from('official');
		$this->db->where('id', $officialId);
		return $this->db->get()->row_array();
	}

	public function getDataPendaftaranRegu($userId)
	{
		return $this->db->get_where('regu', ['user_id' => $userId])->result_array();
	}
	public function getDataPendaftaranReguPemain($userId)
	{
		return $this->db->get_where('pl_beregu', ['user_id' => $userId])->result_array();
  }

  public function getJumlahReguOfficial($userId){
    $this->db->select('o.nama');
    $this->db->from('regu r');
    $this->db->where('r.user_id', $userId);
    $this->db->join('official o', 'o.regu_id = r.id');
    $this->db->where('o.kategori_id is not null');
    return $this->db->get()->result_array();
  }

	public function getDataPendaftaranReguOfficial($userId)
	{
		$this->db->select('k.nama as namaPaket, o.kategori_id, o.nama, o.jenis_kelamin, o.sebagai, o.alergi');
    $this->db->from('official o');
    $this->db->join('regu r', 'r.id = o.regu_id', 'left');
    $this->db->join('kategori k', 'o.kategori_id = k.id', 'left');
    $this->db->where('r.user_id', $userId);
		return $this->db->get()->result_array();
  }

	public function getDataPendaftaranReguOfficialNotNull($userId)
	{
		$this->db->select('k.nama as namaPaket, o.kategori_id, o.nama, o.jenis_kelamin, o.sebagai, o.alergi');
    $this->db->from('official o');
    $this->db->where('o.kategori_id is not null');
    $this->db->join('regu r', 'r.id = o.regu_id', 'left');
    $this->db->join('kategori k', 'o.kategori_id = k.id', 'left');
    $this->db->where('r.user_id', $userId);
		return $this->db->get()->result_array();
	}

	public function getDataPendaftaranPerorangan($userId)
	{
		return $this->db->get_where('pl_perorangan', ['user_id' => $userId])->result_array();
	}

  public function getDataPembayaranPerorangan($userId)
  {
    $this->db->select('pp.nama as nama_pemain, k.nama as nama_kategori, k.harga');
    $this->db->from('pem_orang po');
    $this->db->where('po.user_id', $userId);
    $this->db->join('pl_perorangan pp', 'po.user_id = pp.user_id');
    $this->db->join('kategori k', 'pp.kategori_id = k.id');
    return $this->db->get()->result_array();
  }

  public function getStatusPembayaranPerorangan($userId)
  {
    return $this->db->get_where('pem_orang', ['user_id' => $userId])->row_array();
  }

	public function getDataPembayaranBeregu($userId)
	{
		$this->db->select('k.nama as namaPaket, r.nama, pr.total, pr.status_bayar, pr.tanggal_bayar, pr.updatedAt');
		$this->db->from('regu r');
		$this->db->where('r.user_id', $userId);
		$this->db->join('pem_regu pr', 'pr.regu_id = r.id');
		$this->db->join('kategori k', 'k.id = r.kategori_id');
		return $this->db->get()->result_array();
	}

	public function getTotalBayarRegu($userId)
	{
		$this->db->select('sum(pp.total) as total');
		$this->db->from('pem_regu pp');
		$this->db->where('pp.user_id', $userId);
		return $this->db->get()->row_array();
	}

	public function insertPerorangan($data)
	{
		$this->db->insert_batch('pl_perorangan', $data);
	}

	public function getTotalHargaPerorangan()
	{
		$this->db->select('k.harga, count(pp.kategori_id) as jml, sum(k.harga) as subtotal');
		$this->db->from('pl_perorangan pp');
		$this->db->join('kategori k', 'pp.kategori_id = k.id');
		$this->db->where('pp.user_id', $this->session->userdata('id'));
		$this->db->group_by('k.harga');

		$result = $this->db->get()->result_array();
		$total = 0;

		foreach ($result as $row) {
			$total += $row['subtotal'];
		}
		return $total;
	}

	public function insertPembayaranPerorangan($data)
	{
		$this->db->insert('pem_orang', $data);
	}

	public function updatePembayaran($suffix, $data, $userId)
	{
		$this->db->where('user_id', $userId);
		$this->db->update("pem_$suffix", $data);
	}
}
