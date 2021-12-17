<?php

class Login_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'user';
    	$this->data['primary_key']	= 'username';
	}
	
	public function cek_login($username,$password){
		$user_data = $this->get_row(['username'=>$username]);

		if(isset($user_data)){
			if ($user_data->password == $password) {

				 
				$user_session = [
					'username'	=> $user_data->username, 
					'role_id'	=> $user_data->role_id
				];
				$this->session->set_userdata($user_session);
				return 2;
			}else {
				return 1;
			}
		}
		return 0;
	}
}