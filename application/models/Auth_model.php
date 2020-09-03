<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function cek_user(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->where('email',$email)
						  ->where('password',$password)
						  ->get('user');

		if($this->db->affected_rows() > 0 ){

			$data_login = $query->row();

			$data_session = array(

							'email' => $data_login->email,
							'password' => $data_login->password,
							'logged_in' => TRUE,
							'nama_level' => $data_login->nama_level
			);
			$this->session->set_userdata($data_session);

			return TRUE;
		}else{
			return FALSE;
		}
	}

}