<?php 

class Permintaan_m extends CI_Model
{
	public function getAll_Atk()
	{
		return $this->db->get('atk')->result_array();
	}

	public function getAtk($limit, $start, $keyword = null)
	{
		if ($keyword){
			$this->db->like('nama_barang',$keyword);
			$this->db->or_like('tanggal_penggunaan',$keyword);
		}
		return $this->db->get('atk', $limit, $start)->result_array();
		
	}

	public function countAllAtk()
	{
		return $this->db->get('atk')->num_rows();
	}

	public function hapus_Atk($no_atk)
	{
		// $this->db->where('no_atk', $no_atk);
		$this->db->delete('atk', ['no_atk' => $no_atk]);
	}

	public function getAtkById($no_atk)
	{
		return $this->db->get_where('atk', ['no_atk' => $no_atk])->row_array();
	}

	public function cariData_atk($limit, $start)
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_barang',$keyword);
		$this->db->or_like('tanggal_penggunaan',$keyword);
		return $this->db->get('atk', $limit, $start)->result_array();
	}


	public function getAll_Cetakan()
	{
		return $this->db->get('cetakan')->result_array();
	}

	public function getCetakan($limit, $start, $keyword = null)
	{
		if ($keyword){
			$this->db->like('nama_barang',$keyword);
			$this->db->or_like('tanggal_penggunaan',$keyword);
		}
		return $this->db->get('cetakan', $limit, $start)->result_array();
		
	}

	public function countAllCetakan()
	{
		return $this->db->get('cetakan')->num_rows();
	}

	public function hapus_Cetakan($no_cetakan)
	{
		// $this->db->where('no_cetakan', $no_cetakan);
		$this->db->delete('cetakan', ['no_cetakan' => $no_cetakan]);
	}

	public function getCetakanById($no_cetakan)
	{
		return $this->db->get_where('cetakan', ['no_cetakan' => $no_cetakan])->row_array();
	}

	public function cariData_Cetakan($limit, $start)
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_barang',$keyword);
		$this->db->or_like('tanggal_penggunaan',$keyword);
		return $this->db->get('cetakan', $limit, $start)->result_array();
	}
	

	
	public function getAll_Consumable()
	{
		return $this->db->get('consumable')->result_array();
	}

	public function getConsumable($limit, $start, $keyword = null)
	{
		if ($keyword){
			$this->db->like('nama_barang',$keyword);
			$this->db->or_like('tanggal_penggunaan',$keyword);
		}
		return $this->db->get('consumable', $limit, $start)->result_array();
		
	}

	public function countAllConsumable()
	{
		return $this->db->get('consumable')->num_rows();
	}

	public function hapus_Consumable($no_consumable)
	{
		// $this->db->where('no_consumable', $no_consumable);
		$this->db->delete('consumable', ['no_consumable' => $no_consumable]);
	}

	public function getConsumableById($no_consumable)
	{
		return $this->db->get_where('consumable', ['no_consumable' => $no_consumable])->row_array();
	}

	public function cariData_Consumable($limit, $start)
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_barang',$keyword);
		$this->db->or_like('tanggal_penggunaan',$keyword);
		return $this->db->get('consumable', $limit, $start)->result_array();
	}

	
	public function getAll_PembelianRumahTangga()
	{
		return $this->db->get('pembelianrumahtangga')->result_array();
	}

	public function getPembelianRumahTangga($limit, $start, $keyword = null)
	{
		if ($keyword){
			$this->db->like('nama_barang',$keyword);
			$this->db->or_like('tanggal_penggunaan',$keyword);
		}
		return $this->db->get('pembelianrumahtangga', $limit, $start)->result_array();
		
	}

	public function countAllPembelianRumahTangga()
	{
		return $this->db->get('pembelianrumahtangga')->num_rows();
	}

	public function hapus_PembelianRumahTangga($no_pembelianrt)
	{
		// $this->db->where('no_pembelianrumahtangga', $no_pembelianrt);
		$this->db->delete('pembelianrumahtangga', ['no_pembelianrt' => $no_pembelianrt]);
	}

	public function getPembelianRumahTanggaById($no_pembelianrt)
	{
		return $this->db->get_where('pembelianrumahtangga', ['no_pembelianrt' => $no_pembelianrt])->row_array();
	}

	public function cariData_PembelianRumahTangga($limit, $start)
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_barang',$keyword);
		$this->db->or_like('tanggal_penggunaan',$keyword);
		return $this->db->get('pembelianrumahtangga', $limit, $start)->result_array();
	}

	public function UbahPembelianRumahTangga()
	{
		$data =[
				'nama_barang' => $this->input->post('nama_barang', true),
				'spesifikasi' => $this->input->post('spesifikasi', true),
				'jumlah' => $this->input->post('jumlah', true),
				'satuan' => $this->input->post('satuan', true),
				'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan', true),
				'keterangan' => $this->input->post('keterangan', true)
		];

		$this->db->where('no_pembelianrt', $this->input->post('no_pembelianrt'));
		$this->db->update('pembelianrumahtangga', $data);
	}

}

?>
