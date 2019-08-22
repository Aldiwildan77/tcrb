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

	public function getOfficialData()
	{
		$this->db->select('o.*');
		$this->db->from('regu r');
		$this->db->join('user u', 'r.user_id = u.id');
		$this->db->join('official o', 'o.regu_id = r.id');
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
}
