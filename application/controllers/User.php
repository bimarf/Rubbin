<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['main_view'] = 'view_user';
            $data['user'] = $this->user_model->get_user();
    
            $this->load->view('template', $data);
        }else {
            redirect('login/index');
        }
    }
    public function tambah()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->user_model->tambah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Tambah Berhasil');
                    redirect('user/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal untuk tambah');
                    redirect('user/index');
                }
            }else{
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/user'), 'refresh');
            }

        }else{
            redirect('login/index');
        }
    }
    public function hapus($id){
        if($this->user_model->hapus($id) == TRUE){
            $this->session->set_flashdata('notif', 'sukses hapus cak');
            
            redirect('user/index');
            
			} else {
                $this->session->set_flashdata('notif', 'gagal hapus cak');
                
                redirect('user/index');
                
			}
    }
    public function ubah()
    {
        if($this->session->userdata('logged_in') == TRUE){

            $this->form_validation->set_rules('ubah_nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('ubah_username', 'Username', 'trim|required');
            $this->form_validation->set_rules('ubah_password', 'Password', 'trim|required');
            $this->form_validation->set_rules('ubah_email', 'Email', 'trim|required');
            $this->form_validation->set_rules('ubah_kelas', 'Kelas', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->user_model->ubah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Berhasil ubah data');
                    redirect('user/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal ubah data');
                    redirect('user/index');
                }
            }else{
                $this->session->set_flashdata('notif', validation_errors());
                redirect('user/index');
            }
        }else{
            redirect('login/index');
        }
    }
    public function get_data_user_by_id($id)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $data = $this->user_model->get_data_user_by_id($id);
            echo json_encode($data);
        }else{
            redirect('login/index');
        }
    }
}
