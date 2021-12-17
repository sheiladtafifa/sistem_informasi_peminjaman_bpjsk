<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();

	}

	public function index()
	{
		$data['title'] = 'Kendaraan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array

		$data['kendaraan'] = $this->db->get('kendaraan')->result_array();
		$data['pengemudi'] = $this->db->get('pengemudi')->result_array();

		/*	if($data['role_id'] == 1) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('peminjaman/kendaraan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('peminjaman/kendaraanuser', $data);
			$this->load->view('templates/footer');
		}*/

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
		$this->form_validation->set_rules('pukul', 'Pukul', 'required');
		$this->form_validation->set_rules('haritanggal', 'HariTanggal', 'required');
		$this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');
		$this->form_validation->set_rules('plat', 'Plat', 'required');
		$this->form_validation->set_rules('pengambilan_alat', 'Pengambilan', 'required');
		$this->form_validation->set_rules('pengembalian_alat', 'Pengembalian', 'required');
		$this->form_validation->set_rules('id_pengemudi', 'Pengemudi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('peminjaman/kendaraanuser', $data);
			$this->load->view('templates/footer');
		} else 
		{
			$data = [
				'nama' => $this->input->post('nama'),
				'bidang' => $this->input->post('bidang'),
				'keperluan' => $this->input->post('keperluan'),
				'pukul' => $this->input->post('pukul'),
				'haritanggal' => $this->input->post('haritanggal'),
				'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
				'plat' => $this->input->post('plat'),
				'pengambilan_alat' => $this->input->post('pengambilan_alat'),
				'pengembalian_alat' => $this->input->post('pengembalian_alat'),
				'id_pengemudi' => $this->input->post('id_pengemudi') 
			];
			$this->db->insert('daftar_peminjamkendaraan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Anda telah berhasil mengisi form peminjaman</div>');
					redirect('index.php/peminjaman/kendaraanuser');
		}
		
	}

	public function laptop()
	{
		$data['title'] = 'Laptop';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('peminjaman/laptop', $data);
			$this->load->view('templates/footer');
	}

}