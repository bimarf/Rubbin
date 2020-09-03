<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sampah_model');
    }
	public function index()
	{
        $data['main_view'] = 'view_sampah';
        $data['sampah'] = $this->sampah_model->get_sampah();
        $this->load->model('poin_model');
        $data['data_poin'] = $this->poin_model->get_poin();

        $this->load->view('template', $data);
    }
    
    public function hapus_sampah($id)
	{
		if($this->sampah_model->hapus($id) == TRUE){
            $this->session->set_flashdata('pesan', 'sukses hapus cak');
            
            redirect('sampah/index');
            
			} else {
                $this->session->set_flashdata('pesan', 'gagal hapus cak');
                
                redirect('sampah/index');
                
			}

    }
    public function tambah()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('id_poin', 'poin', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->sampah_model->tambah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Tambah Berhasil');
                    redirect('sampah/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal untuk tambah');
                    redirect('sampah/index');
                }
            }else{
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/sampah'), 'refresh');
            }

        }else{
            redirect('login/index');
        }
    }

    public function ubah()
    {
        if($this->session->userdata('logged_in') == TRUE){

            $this->form_validation->set_rules('ubah_nama', 'jenis', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->sampah_model->ubah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Berhasil ubah data');
                    redirect('sampah/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal ubah data');
                    redirect('sampah/index');
                }
            }else{
                $this->session->set_flashdata('notif', validation_errors());
                redirect('sampah/index');
            }
        }else{
            redirect('login/index');
        }
    }
    public function get_data_sampah_by_id($id)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $data = $this->sampah_model->get_data_sampah_by_id($id);
            echo json_encode($data);
        }else{
            redirect('login/index');
        }
    }
    
}
