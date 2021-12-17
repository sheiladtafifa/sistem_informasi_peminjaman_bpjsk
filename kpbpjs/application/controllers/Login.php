<?php
/**
 *
 */
class Login extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->data['username'] = $this->session->userdata('username');
    $this->data['role_id']  = $this->session->userdata('role_id'); 

    if (isset($this->data['username'], $this->data['role_id']))
    {  
      switch ($this->data['role_id'])
      {
        case 1:
          redirect('admin');
          break;
        case 2:
          redirect('user');
          break;    
      }
      exit();
    }


    $this->load->model('Login_m');
  }

  public function index()
  {
    if ($this->session->userdata('username')) {
      redirect('index.php/peminjaman/index');
    }

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

  public function cek(){
      $username = $this->POST('username');
      $password = $this->POST('password');


      if($this->Login_m->cek_login($username,$password) == 0){
        $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> username tidak terdaftar!', 'danger');
        redirect('login');
        exit;
      }else if($this->Login_m->cek_login($username,$password) == 1){
        setcookie('username_temp', $username, time() + 5, "/");
        $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Password Salah!', 'danger');
        redirect('login');
        exit;
      }
      
    redirect('login');
  }

  /*public function index() {
 
    $this->load->view('sign-in');

  }*/

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

?>
