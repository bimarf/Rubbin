<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reward_model');
    }
    public function index()
	{
        if($this->session->userdata('logged_in') == TRUE){
            $data['main_view'] = 'view_reward';
            $data['reward'] = $this->reward_model->get_reward();
    
            $this->load->view('template', $data);
        }else {
            redirect('login/index');
        }

    }
    public function hapus($id){
        if($this->reward_model->hapus($id) == TRUE){
            $this->session->set_flashdata('pesan', 'sukses hapus cak');
            
            redirect('reward/index');
            
			} else {
                $this->session->set_flashdata('pesan', 'gagal hapus cak');
                
                redirect('reward/index');
                
			}
    }
    public function tambah()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('nama_reward', 'Nama', 'trim|required');
            $this->form_validation->set_rules('harga_poin', 'harga', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->reward_model->tambah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Tambah Berhasil');
                    redirect('reward/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal untuk tambah');
                    redirect('reward/index');
                }
            }else{
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/reward'), 'refresh');
            }

        }else{
            redirect('login/index');
        }
    }
    public function ubah()
    {
        if($this->session->userdata('logged_in') == TRUE){

            $this->form_validation->set_rules('ubah_nama_reward', 'Nama Reward', 'trim|required');
            $this->form_validation->set_rules('ubah_harga_poin', 'Harga Poin', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->reward_model->ubah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Berhasil ubah data');
                    redirect('reward/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal ubah data');
                    redirect('reward/index');
                }
            }else{
                $this->session->set_flashdata('notif', validation_errors());
                redirect('reward/index');
            }
        }else{
            redirect('login/index');
        }
    }
    public function get_data_reward_by_id($id)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $data = $this->reward_model->get_data_reward_by_id($id);
            echo json_encode($data);
        }else{
            redirect('login/index');
        }
    }
}
