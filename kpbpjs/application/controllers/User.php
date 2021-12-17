<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class User extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('user/dashboard');
		$this->load->view('templates/footer');
	}

	public function kendaraan()
	{
		$data['title'] = 'Kendaraan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array

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
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('user/kendaraan_user');
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
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah mengisi form Peminjaman Kendaraan</div>');
		redirect('index.php/user/kendaraan');
		}
	}

		public function laptop()
		{
			$data['title'] = 'Laptop';
			$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array

			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
			$this->form_validation->set_rules('bidang', 'Bidang', 'required|trim');
			$this->form_validation->set_rules('pemakaian_laptop', 'Pemakaian Laptop', 'required|trim');
			$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
			$this->form_validation->set_rules('warna', 'Warna', 'required|trim');
			$this->form_validation->set_rules('kelengkapan', 'Kelengkapan', 'required|trim');
			$this->form_validation->set_rules('waktu_peminjaman', 'Waktu Peminjaman', 'required|trim');

			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('user/laptop_user');
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah mengisi form Peminjaman Laptop</div>');
			redirect('index.php/user/laptop');
			}
		}

		public function permintaan()
		{
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('user/dashboard_permintaan');
		$this->load->view('templates/footer');
		}

		public function atk()
		{
		$data['title'] = 'ATK';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array

		//$this->form_validation->set_rules('no_atk','NO','required|numeric');
		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('user/atk', $data);
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah mengisi form ATK</div>');
			redirect('index.php/user/atk');
		}
	}


	public function cetakan()
	{
		$data['title'] = 'Cetakan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('user/cetakan', $data);
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah mengisi form Cetakan</div>');
			redirect('index.php/user/cetakan');
		}
	}
		

	public function consumable()
	{
		$data['title'] = 'Consumable';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('user/consumable', $data);
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah mengisi form Consumable</div>');
			redirect('index.php/user/consumable');
		}
	}

	public function pembelianrumahtangga()
	{
		$data['title'] = 'Pembelian Rumah Tangga';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array

		$this->form_validation->set_rules('nama_barang','NAMA BARANG/JASA','required|trim');
		$this->form_validation->set_rules('spesifikasi','SPESIFIKASI');
		$this->form_validation->set_rules('jumlah','JUMLAH','required|trim');
		$this->form_validation->set_rules('satuan','SATUAN','required|trim');
		$this->form_validation->set_rules('tanggal_penggunaan','TANGGAL_PENGGUNAAN','required');
		$this->form_validation->set_rules('keterangan','KETERANGAN'); 

		if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('user/pembelianrumahtangga', $data);
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah mengisi form Pembelian Rumah Tangga</div>');
			redirect('index.php/user/pembelianrumahtangga');
		}
	}

	public function tampilkendaraan()
	{
		$data['title'] = 'Tampilan Peminjaman Kendaraan';
		$this->load->model('model_kendaraan', 'daftar_peminjamkendaraan');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/user/tampilkendaraan/tampilkendaraan';
		$config['total_rows'] = $this->daftar_peminjamkendaraan->countAllKendaraan();
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
		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['daftar_peminjamkendaraan'] = $this->daftar_peminjamkendaraan->getKendaraan($config['per_page'],$data['start']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/tampilkendaraan', $data);
		$this->load->view('templates/footer');
	}

	public function tampil_laptop()
	{
		$data['title'] = 'Tampilan Peminjaman Laptop';
		$this->load->model('model_laptop', 'daftar_peminjamlaptop');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/user/tampil_laptop/tampil_laptop';
		$config['total_rows'] = $this->daftar_peminjamlaptop->countAllLaptop();
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
		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['daftar_peminjamlaptop'] = $this->daftar_peminjamlaptop->getLaptop($config['per_page'],$data['start']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/tampil_laptop', $data);
		$this->load->view('templates/footer');
	}

	public function tampilatk()
	{
		$data['title'] = 'Tampilan ATK';
		$this->load->model('Permintaan_m', 'atk');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/user/tampilatk/tampilatk';
		$config['total_rows'] = $this->atk->countAllAtk();
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
		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['atk'] = $this->atk->getAtk($config['per_page'],$data['start']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/tampilatk', $data);
		$this->load->view('templates/footer');
	}

	public function tampilcetakan()
	{
		$data['title'] = 'Tampilan CETAKAN';
		$this->load->model('Permintaan_m', 'cetakan');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/user/tampilcetakan/tampilcetakan';
		$config['total_rows'] = $this->cetakan->countAllCetakan();
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
		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['cetakan'] = $this->cetakan->getcetakan($config['per_page'],$data['start']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/tampilcetakan', $data);
		$this->load->view('templates/footer');
	}

	public function tampilconsumable()
	{
		$data['title'] = 'Tampilan CONSUMABLE';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); //sebaris yg row array
		$data['consumable'] = $this->db->get('consumable')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/tampilconsumable', $data);
		$this->load->view('templates/footer');
	}

	public function tampilpembelianrumahtangga()
	{
		$data['title'] = 'Tampilan PEMBELIAN RUMAH TANGGA';
		$this->load->model('Permintaan_m', 'pembelianrumahtangga');

		//Load library
		$this->load->library('pagination');

		//Config
		$config['base_url'] = 'http://localhost/kpbpjs/index.php/user/tampil_pembelianrumahtangga/tampil_pembelianrumahtangga';
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
		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['pembelianrumahtangga'] = $this->pembelianrumahtangga->getPembelianRumahTangga($config['per_page'],$data['start']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/tampilpembelianrumahtangga', $data);
		$this->load->view('templates/footer');
	}
}