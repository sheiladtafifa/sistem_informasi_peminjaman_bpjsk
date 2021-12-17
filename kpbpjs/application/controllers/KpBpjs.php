<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KpBpjs extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		//if ($this->session->userdata('username')) {
			//redirect('index.php/user/index');
		//}

		$this->form_validation->set_rules('username', 'Username', 'trim|required', [
			'required' => 'Username harus diisi!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Password harus diisi!'
		]);
		if($this->form_validation->run() == false) {
		$data['title'] = 'Login';
		$this->load->view('auth_header', $data);
		$this->load->view('login');
		$this->load->view('auth_footer');
		} 
		else 
		{
			// validasinya success
			$this->login();
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		// jika usernya ada 
		if($user)
		{
				// cek password 
				if($user['password'] == $password)
				{
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) {
						redirect('index.php/admin/index');
					} else {
						redirect('index.php/user/index');
					}
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
					redirect('index.php/kpbpjs/index');
				}
		}
			else 
			{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Salah!</div>');
			redirect('index.php/kpbpjs/index');
			}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu Berhasil Logout!</div>');
			redirect('index.php/kpbpjs/index');
	}

	public function blocked()
	{
		$this->load->view('blocked');
	}

	
}