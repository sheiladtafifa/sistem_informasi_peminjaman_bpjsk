<?php

/**
* 
*/
class Model_laptop extends CI_Model
{
	public function getAll_Laptop()
	{
		return $this->db->get('daftar_peminjamlaptop')->result_array();
	}

	public function getLaptop($limit, $start, $keyword = null)
	{
		if ($keyword){
			$this->db->like('nama',$keyword);
			$this->db->or_like('waktu_peminjaman',$keyword);
		}
		return $this->db->get('daftar_peminjamlaptop', $limit, $start)->result_array();
		
	}

	public function countAllLaptop()
	{
		return $this->db->get('daftar_peminjamlaptop')->num_rows();
	}

	public function hapus_Laptop($id)
	{
		// $this->db->where('no_atk', $no_atk);
		$this->db->delete('daftar_peminjamlaptop', ['id' => $id]);
	}

	public function getLaptopById($id)
	{
		return $this->db->get_where('daftar_peminjamlaptop', ['id' => $id])->row_array();
	}

	public function cariData_laptop($limit, $start)
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama',$keyword);
		$this->db->or_like('waktu_peminjaman',$keyword);
		return $this->db->get('daftar_peminjamlaptop', $limit, $start)->result_array();
	}
}