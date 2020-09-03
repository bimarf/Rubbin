<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kasir_model');
    }
	public function index()
	{
        if($this->session->userdata('logged_in') == TRUE){
            $data['main_view'] = 'view_kasir';
			$data['kasir'] = $this->kasir_model->get_kasir();
			$this->load->model('user_model');
			$data['data_user'] = $this->user_model->get_user();
			$this->load->model('sampah_model');
			$data['data_sampah'] = $this->sampah_model->get_sampah();
			$this->load->model('poin_model');
			$data['data_poin'] = $this->poin_model->get_poin();

    
            $this->load->view('template', $data);
        }else {
            redirect('login/index');
        }

    }
    public function hapus($id){
        if($this->kasir_model->hapus($id) == TRUE){
            $this->session->set_flashdata('notif', 'sukses hapus cak');
            
            redirect('kasir/index');
            
			} else {
                $this->session->set_flashdata('notif', 'gagal hapus cak');
                
                redirect('kasir/index');
                
			}
    }
    public function tambah()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('id_user', 'Id User', 'trim|required');
            $this->form_validation->set_rules('id_sampah', 'Id sampah', 'trim|required');
			$this->form_validation->set_rules('id_poin', 'Id poin', 'trim|required');
			$this->form_validation->set_rules('jumlah_sampah', 'Jumlah sampah', 'trim|required');
			$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
			$this->form_validation->set_rules('jumlah_poin', 'Jumlah_poin', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->kasir_model->tambah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Tambah Berhasil');
                    redirect('kasir/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal untuk tambah');
                    redirect('kasir/index');
                }
            }else{
                $this->session->set_flashdata('notif', validation_errors());
                redirect(base_url('index.php/kasir'), 'refresh');
            }

        }else{
            redirect('login/index');
        }
    }
}
