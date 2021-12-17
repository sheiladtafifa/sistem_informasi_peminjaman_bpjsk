<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Peminjamankendaraan_model extends CI_Model
{
	
	public function getKendaraan()
	{
		$query = "SELECT `daftar_peminjamkendaraan`.*, `kendaraan`.*
		 		FROM `daftar_peminjamkendaraan` JOIN `kendaraan`
		 		ON `daftar_peminjamkendaraan`.`id_kendaraan` = `kendaraan`.`id`
		 		";
		 return $this->db->query($query)->result_array();
	}

}