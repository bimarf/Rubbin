<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
	public function index()
	{
        if($this->session->userdata('logged_in') == TRUE){
            $data['main_view'] = 'view_admin';
            $data['admin'] = $this->admin_model->get_admin();
    
            $this->load->view('template', $data);
        }else {
            redirect('login/index');
        }

    }
    public function hapus($id){
        if($this->admin_model->hapus($id) == TRUE){
            $this->session->set_flashdata('notif', 'sukses hapus cak');
            
            redirect('admin/index');
            
			} else {
                $this->session->set_flashdata('notif', 'gagal hapus cak');
                
                redirect('admin/index');
                
			}
    }
    public function tambah()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->admin_model->tambah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Tambah Berhasil');
                    redirect('admin/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal untuk tambah');
                    redirect('admin/index');
                }
            }else{
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/admin'), 'refresh');
            }

        }else{
            redirect('login/index');
        }
    }
    public function ubah()
    {
        if($this->session->userdata('logged_in') == TRUE){

            $this->form_validation->set_rules('ubah_nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('ubah_username', 'Username', 'trim|required');
            $this->form_validation->set_rules('ubah_password', 'Password', 'trim|required');


            if($this->form_validation->run() == TRUE){
                if($this->admin_model->ubah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Berhasil ubah data');
                    redirect('admin/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal ubah data');
                    redirect('admin/index');
                }
            }else{
                $this->session->set_flashdata('notif', validation_errors());
                redirect('admin/index');
            }
        }else{
            redirect('login/index');
        }
    }
    public function get_data_admin_by_id($id)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $data = $this->admin_model->get_data_admin_by_id($id);
            echo json_encode($data);
        }else{
            redirect('login/index');
        }
    }
}
