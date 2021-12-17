<?php

/**
* 
*/
class Model_kendaraan extends CI_Model
{
	public function getAll_Kendaraan()
	{
		return $this->db->get('daftar_peminjamkendaraan')->result_array();
	}

	public function getKendaraan($limit, $start, $keyword = null)
	{
		if ($keyword){
			$this->db->like('nama',$keyword);
			$this->db->or_like('haritanggal',$keyword);
		}
		return $this->db->get('daftar_peminjamkendaraan', $limit, $start)->result_array();
		
	}

	public function countAllKendaraan()
	{
		return $this->db->get('daftar_peminjamkendaraan')->num_rows();
	}

	public function hapus_Kendaraan($id)
	{
		// $this->db->where('no_atk', $no_atk);
		$this->db->delete('daftar_peminjamkendaraan', ['id' => $id]);
	}

	public function getKendaraanById($id)
	{
		return $this->db->get_where('daftar_peminjamkendaraan', ['id' => $id])->row_array();
	}

	public function cariData_kendaraan($limit, $start)
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama',$keyword);
		$this->db->or_like('haritanggal',$keyword);
		return $this->db->get('daftar_peminjamkendaraan', $limit, $start)->result_array();
	}
}