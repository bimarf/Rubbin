<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			redirect('dashboard/index');

		} else {
			$this->load->view('auth');
		}
	}

	public function cek_login(){
		if($this->session->userdata('logged_in') == FALSE){

			$this->form_validation->set_rules('email','email','trim|required');
			$this->form_validation->set_rules('password','password','trim|required');

			if($this->form_validation->run() == TRUE){
				if($this->auth_model->cek_user() == TRUE){
					redirect('dashboard/index');
				} else {
					$this->session->set_flashdata('notif','Login Gagal');
					redirect('auth/index');
				} 	
			}else {
				$this->session->set_flashdata('notif',validation_errors());
				redirect('auth/index');
			}
		
		} else {
			redirect('dashboard/index');
		} 
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth/index');
	}
}