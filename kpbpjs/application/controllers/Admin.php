<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Admin extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer');
	}

	public function kelola_kendaraan()
	{
		$data['title'] = 'Kelola Kendaraan';

		$this->load->model('model_kendaraan', 'daftar_peminjamkendaraan');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/admin/kelola_kendaraan/kelola_kendaraan';
		//$config['num_links'] = 5;

		//Styling
		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = ' </ul> </nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open']  = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open']  = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';

		$config['num_tag_open']  = '<li class="page-item">';
		$config['num_tag_close']  = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		//ambil data keyword
		if($this->input->post('submit'))
		{
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);	
		}
		else
		{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//Config
		$this->db->like('nama',$data['keyword']);
		$this->db->or_like('haritanggal',$data['keyword']);
		$this->db->from('daftar_peminjamkendaraan');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['daftar_peminjamkendaraan'] = $this->daftar_peminjamkendaraan->getKendaraan($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/kelola_kendaraan', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_kendaraan()
	{
		$data['title'] = 'Tambah Data Peminjaman Kendaraan';
		$this->load->model('model_kendaraan', 'daftar_peminjamkendaraan');

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required|trim');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required|trim');
		$this->form_validation->set_rules('pukul', 'Pukul', 'required|trim');
		$this->form_validation->set_rules('haritanggal', 'HariTanggal', 'required|trim');
		$this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required|trim');
		$this->form_validation->set_rules('plat', 'Plat', 'required|trim');
		$this->form_validation->set_rules('pengambilan_alat', 'Pengambilan');
		$this->form_validation->set_rules('pengembalian_alat', 'Pengembalian');
		$this->form_validation->set_rules('nama_pengemudi', 'Nama Pengemudi');

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/tambah_kendaraan', $data);
				$this->load->view('templates/footer');
		} else {
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
				'nama_pengemudi' => $this->input->post('nama_pengemudi')
			];

			$this->db->insert('daftar_peminjamkendaraan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Peminjaman Kendaraan berhasil ditambahkan! </div>');
			redirect('index.php/admin/kelola_kendaraan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/tambah_kendaraan', $data);
		$this->load->view('templates/footer');
		}
	}

	public function edit_kendaraan($id)
	{
		$data['title'] = 'Edit Data Peminjaman Kendaraan';
		$data['daftar_peminjamkendaraan'] = $this->model_kendaraan->getKendaraanById($id);
		//$this->load->model('Permintaan_m', 'atk');

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required|trim');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required|trim');
		$this->form_validation->set_rules('pukul', 'Pukul', 'required|trim');
		$this->form_validation->set_rules('haritanggal', 'HariTanggal', 'required|trim');
		$this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required|trim');
		$this->form_validation->set_rules('plat', 'Plat', 'required|trim');
		$this->form_validation->set_rules('pengambilan_alat', 'Pengambilan');
		$this->form_validation->set_rules('pengembalian_alat', 'Pengembalian');
		$this->form_validation->set_rules('nama_pengemudi', 'Nama Pengemudi'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/edit_kendaraan', $data);
				$this->load->view('templates/footer');
		} else {
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
				'nama_pengemudi' => $this->input->post('nama_pengemudi')
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('daftar_peminjamkendaraan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Peminjaman Kendaraan berhasil diubah! </div>');
			redirect('index.php/admin/kelola_kendaraan');
		}
	}

	public function hapus_kendaraan($id)
	{
		//$this->load->model('Permintaan_m', 'atk');
		
		$this->model_kendaraan->hapus_Kendaraan($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Peminjaman Kendaraan berhasil dihapus! </div>');
		redirect('index.php/admin/kelola_kendaraan');
	} 

	public function kelola_laptop()
	{
		$data['title'] = 'Kelola Laptop';

		$this->load->model('model_laptop', 'daftar_peminjamlaptop');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/admin/kelola_laptop/kelola_laptop';
		//$config['num_links'] = 5;

		//Styling
		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = ' </ul> </nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open']  = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open']  = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';

		$config['num_tag_open']  = '<li class="page-item">';
		$config['num_tag_close']  = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		//ambil data keyword
		if($this->input->post('submit'))
		{
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);	
		}
		else
		{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//Config
		$this->db->like('nama',$data['keyword']);
		$this->db->or_like('waktu_peminjaman',$data['keyword']);
		$this->db->from('daftar_peminjamlaptop');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['daftar_peminjamlaptop'] = $this->daftar_peminjamlaptop->getLaptop($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/kelola_laptop', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_laptop()
	{
		$data['title'] = 'Tambah Data Peminjaman Laptop';
		$this->load->model('model_laptop', 'daftar_peminjamlaptop');

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required|trim');
		$this->form_validation->set_rules('pemakaian_laptop', 'Pemakaian Laptop', 'required|trim');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('warna', 'Warna', 'required|trim');
		$this->form_validation->set_rules('kelengkapan', 'Kelengkapan', 'required|trim');
		$this->form_validation->set_rules('waktu_peminjaman', 'Waktu Peminjaman', 'required|trim');

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/tambah_laptop', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
					'nama' => $this->input->post('nama'),
					'jabatan' => $this->input->post('jabatan'),
					'bidang' => $this->input->post('bidang'),
					'pemakaian_laptop' => $this->input->post('pemakaian_laptop'),
					'jenis' => $this->input->post('jenis'),
					'warna' => $this->input->post('warna'),
					'kelengkapan' => $this->input->post('kelengkapan'),
					'waktu_peminjaman' => $this->input->post('waktu_peminjaman')
			];

			$this->db->insert('daftar_peminjamlaptop', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Peminjaman Laptop berhasil ditambahkan! </div>');
			redirect('index.php/admin/kelola_laptop');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/tambah_laptop', $data);
		$this->load->view('templates/footer');
		}
	}

	public function edit_laptop($id)
	{
		$data['title'] = 'Edit Data Peminjaman Laptop';
		$data['daftar_peminjamlaptop'] = $this->model_laptop->getLaptopById($id);
		//$this->load->model('Permintaan_m', 'atk');

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('bidang', 'Bidang', 'required|trim');
		$this->form_validation->set_rules('pemakaian_laptop', 'Pemakaian Laptop', 'required|trim');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('warna', 'Warna', 'required|trim');
		$this->form_validation->set_rules('kelengkapan', 'Kelengkapan', 'required|trim');
		$this->form_validation->set_rules('waktu_peminjaman', 'Waktu Peminjaman', 'required|trim'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/edit_laptop', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'bidang' => $this->input->post('bidang'),
				'pemakaian_laptop' => $this->input->post('pemakaian_laptop'),
				'jenis' => $this->input->post('jenis'),
				'warna' => $this->input->post('warna'),
				'kelengkapan' => $this->input->post('kelengkapan'),
				'waktu_peminjaman' => $this->input->post('waktu_peminjaman')
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('daftar_peminjamlaptop', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Peminjaman Laptop berhasil diubah! </div>');
			redirect('index.php/admin/kelola_laptop');
		}
	}

	public function hapus_laptop($id)
	{
		//$this->load->model('Permintaan_m', 'atk');
		
		$this->model_laptop->hapus_Laptop($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Peminjaman Laptop berhasil dihapus! </div>');
		redirect('index.php/admin/kelola_laptop');
	} 

	public function permintaan_admin()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('admin/permintaan_admin');
		$this->load->view('templates/footer');
	}

	public function kelola_atk()
	{
		$data['title'] = 'Kelola ATK';

		$this->load->model('Permintaan_m', 'atk');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/admin/kelola_atk/kelola_atk';
		//$config['num_links'] = 5;

		//Styling
		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = ' </ul> </nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open']  = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open']  = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';

		$config['num_tag_open']  = '<li class="page-item">';
		$config['num_tag_close']  = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		//ambil data keyword
		if($this->input->post('submit'))
		{
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);	
		}
		else
		{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//Config
		$this->db->like('nama_barang',$data['keyword']);
		$this->db->or_like('tanggal_penggunaan',$data['keyword']);
		$this->db->from('atk');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['atk'] = $this->atk->getAtk($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/kelola_atk', $data);
		$this->load->view('templates/footer');
	}

	public function kelola_cetakan()
	{
		$data['title'] = 'Kelola Cetakan';

		$this->load->model('Permintaan_m', 'cetakan');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/admin/kelola_cetakan/kelola_cetakan';
		//$config['num_links'] = 5;

		//Styling
		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = ' </ul> </nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open']  = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open']  = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';

		$config['num_tag_open']  = '<li class="page-item">';
		$config['num_tag_close']  = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		//ambil data keyword
		if($this->input->post('submit'))
		{
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);	
		}
		else
		{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//Config
		$this->db->like('nama_barang',$data['keyword']);
		$this->db->or_like('tanggal_penggunaan',$data['keyword']);
		$this->db->from('cetakan');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['cetakan'] = $this->cetakan->getCetakan($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/kelola_cetakan', $data);
		$this->load->view('templates/footer');
	}

	public function kelola_consumable()
	{
		$data['title'] = 'Kelola Consumable';

		$this->load->model('Permintaan_m', 'consumable');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/admin/kelola_consumable/kelola_consumable';
		$config['total_rows'] = $this->consumable->countAllConsumable();
		$config['per_page'] = 5;

		//Styling
		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = ' </ul> </nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open']  = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open']  = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';

		$config['num_tag_open']  = '<li class="page-item">';
		$config['num_tag_close']  = '</li>';

		$config['attributes'] = array('class' => 'page-link');	

		//ambil data keyword
		if($this->input->post('submit'))
		{
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);	
		}
		else
		{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//Config
		$this->db->like('nama_barang',$data['keyword']);
		$this->db->or_like('tanggal_penggunaan',$data['keyword']);
		$this->db->from('consumable');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['consumable'] = $this->consumable->getconsumable($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/kelola_consumable', $data);
		$this->load->view('templates/footer');
	}

	public function kelola_pembelianrumahtangga()
	{
		$data['title'] = 'Kelola Pembelian Rumah Tangga';

		$this->load->model('Permintaan_m', 'pembelianrumahtangga');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/admin/kelola_pembelianrumahtangga/kelola_pembelianrumahtangga';
		$config['total_rows'] = $this->pembelianrumahtangga->countAllPembelianRumahTangga();
		$config['per_page'] = 5;

		//Styling
		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = ' </ul> </nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open']  = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open']  = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open']  = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';

		$config['num_tag_open']  = '<li class="page-item">';
		$config['num_tag_close']  = '</li>';

		$config['attributes'] = array('class' => 'page-link');		
		
		//ambil data keyword
		if($this->input->post('submit'))
		{
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);	
		}
		else
		{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//Config
		$this->db->like('nama_barang',$data['keyword']);
		$this->db->or_like('tanggal_penggunaan',$data['keyword']);
		$this->db->from('pembelianrumahtangga');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['pembelianrumahtangga'] = $this->pembelianrumahtangga->getPembelianRumahTangga($config['per_page'],$data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/kelola_pembelianrumahtangga', $data);
		$this->load->view('templates/footer');
		
	}


	public function tambah_atk()
	{
		$data['title'] = 'Tambah Data ATK';
		$this->load->model('Permintaan_m', 'atk');

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/tambah_atk', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_barang' => $this->input->post('nama_barang'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
				'keterangan' => $this->input->post('keterangan')
			];

			$this->db->insert('atk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data ATK berhasil ditambahkan! </div>');
			redirect('index.php/admin/kelola_atk');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/tambah_atk', $data);
		$this->load->view('templates/footer');
		}
	}

	public function tambah_cetakan()
	{
		$data['title'] = 'Tambah Data Cetakan';
		$this->load->model('Permintaan_m', 'cetakan');

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/tambah_cetakan', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_barang' => $this->input->post('nama_barang'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
				'keterangan' => $this->input->post('keterangan')
			];

			$this->db->insert('cetakan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data cetakan berhasil ditambahkan! </div>');
			redirect('index.php/admin/kelola_cetakan');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/tambah_cetakan', $data);
		$this->load->view('templates/footer');
		}
	}

	public function tambah_consumable()
	{
		$data['title'] = 'Tambah Data Consumable';
		$this->load->model('Permintaan_m', 'consumable');

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/tambah_consumable', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_barang' => $this->input->post('nama_barang'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
				'keterangan' => $this->input->post('keterangan')
			];

			$this->db->insert('consumable', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data consumable berhasil ditambahkan! </div>');
			redirect('index.php/admin/kelola_consumable');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/tambah_consumable', $data);
		$this->load->view('templates/footer');
		}
	}

	public function tambah_pembelianrumahtangga()
	{
		$data['title'] = 'Tambah Data Pembelian Rumah Tangga';
		$this->load->model('Permintaan_m', 'pembelianrumahtangga');

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/tambah_pembelianrumahtangga', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_barang' => $this->input->post('nama_barang'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
				'keterangan' => $this->input->post('keterangan')
			];

			$this->db->insert('pembelianrumahtangga', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data pembelian rumah tangga berhasil ditambahkan! </div>');
			redirect('index.php/admin/kelola_pembelianrumahtangga');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/tambah_pembelianrumahtangga', $data);
		$this->load->view('templates/footer');
		}
	}

	public function edit_atk($no_atk)
	{
		$data['title'] = 'Edit Data ATK';
		$data['atk'] = $this->Permintaan_m->getAtkById($no_atk);
		//$this->load->model('Permintaan_m', 'atk');

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/edit_atk', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_barang' => $this->input->post('nama_barang'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
				'keterangan' => $this->input->post('keterangan')
			];

			$this->db->where('no_atk', $this->input->post('no_atk'));
			$this->db->update('atk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data ATK berhasil diubah! </div>');
			redirect('index.php/admin/kelola_atk');
		}
	}

	public function edit_cetakan($no_cetakan)
	{
		$data['title'] = 'Edit Data Cetakan';
		$data['cetakan'] = $this->Permintaan_m->getCetakanById($no_cetakan);
		//$this->load->model('Permintaan_m', 'cetakan');

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/edit_cetakan', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_barang' => $this->input->post('nama_barang'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
				'keterangan' => $this->input->post('keterangan')
			];

			$this->db->where('no_cetakan', $this->input->post('no_cetakan'));
			$this->db->update('cetakan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data cetakan berhasil diubah! </div>');
			redirect('index.php/admin/kelola_cetakan');
		}
	}

	public function edit_consumable($no_consumable)
	{
		$data['title'] = 'Edit Data Consumable';
		$data['consumable'] = $this->Permintaan_m->getconsumableById($no_consumable);
		//$this->load->model('Permintaan_m', 'consumable');

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/edit_consumable', $data);
				$this->load->view('templates/footer');
		} else {
			$data = [
				'nama_barang' => $this->input->post('nama_barang'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
				'keterangan' => $this->input->post('keterangan')
			];

			$this->db->where('no_consumable', $this->input->post('no_consumable'));
			$this->db->update('consumable', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data consumable berhasil diubah! </div>');
			redirect('index.php/admin/kelola_consumable');
		}
	}

	public function edit_pembelianrt($no_pembelianrt)
	{
		$data['title'] = 'Tambah Data Pembelian Rumah Tangga';
		$data['pembelianrumahtangga'] = $this->Permintaan_m->getPembelianRumahTanggaById($no_pembelianrt);
		//$this->load->model('Permintaan_m', 'pembelianrumahtangga');

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('admin/edit_pembelianrt', $data);
				$this->load->view('templates/footer');
		} else {
			//$this->db->insert('pembelianrumahtangga', $data);
			$this->Permintaan_m->UbahPembelianRumahTangga();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data pembelian rumah tangga berhasil diubah! </div>');
			redirect('index.php/admin/kelola_pembelianrumahtangga');

		/*$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/tambah_pembelianrumahtangga', $data);
		$this->load->view('templates/footer');*/
		}
	}

	public function hapus_atk($no_atk)
	{
		//$this->load->model('Permintaan_m', 'atk');
		
		$this->Permintaan_m->hapus_Atk($no_atk);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data ATK berhasil dihapus! </div>');
		redirect('index.php/admin/kelola_atk');
	} 

	public function hapus_cetakan($no_cetakan)
	{
		$this->Permintaan_m->hapus_Cetakan($no_cetakan);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data cetakan berhasil dihapus! </div>');
		redirect('index.php/admin/kelola_cetakan');
	}

	public function hapus_consumable($no_consumable)
	{
		$this->Permintaan_m->hapus_Consumable($no_consumable);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data consumable berhasil dihapus! </div>');
		redirect('index.php/admin/kelola_consumable');
	}

	public function hapus_pembelianrumahtangga($no_pembelianrt)
	{
		$this->Permintaan_m->hapus_PembelianRumahTangga($no_pembelianrt);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Pembelian Rumah Tangga berhasil dihapus! </div>');
		redirect('index.php/admin/kelola_pembelianrumahtangga');
	}
}