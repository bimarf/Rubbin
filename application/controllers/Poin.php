<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('poin_model');
    }
	public function index()
	{
        if($this->session->userdata('logged_in') == TRUE){
            $data['main_view'] = 'view_poin';
            $data['poin'] = $this->poin_model->get_poin();
            $this->load->model('sampah_model');
            $data['data_sampah'] = $this->sampah_model->get_sampah();
    
            $this->load->view('template', $data);
        }else {
            redirect('login/index');
        }

    }
    public function hapus($id){
        if($this->poin_model->hapus($id) == TRUE){
            $this->session->set_flashdata('notif', 'sukses hapus cak');
            
            redirect('poin/index');
            
			} else {
                $this->session->set_flashdata('notif', 'gagal hapus cak');
                
                redirect('poin/index');
                
			}
    }
    public function tambah()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
            $this->form_validation->set_rules('jenis', 'jenis', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->poin_model->tambah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Tambah Berhasil');
                    redirect('poin/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal untuk tambah');
                    redirect('poin/index');
                }
            }else{
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/poin'), 'refresh');
            }

        }else{
            redirect('login/index');
        }
    }

    public function ubah()
    {
        if($this->session->userdata('logged_in') == TRUE){

            $this->form_validation->set_rules('ubah_jenis', 'jenis', 'trim|required');
            $this->form_validation->set_rules('ubah_jumlah', 'jumlah', 'trim|required');

            if($this->form_validation->run() == TRUE){
                if($this->poin_model->ubah() == TRUE)
                {
                    $this->session->set_flashdata('notif', 'Berhasil ubah data');
                    redirect('poin/index');
                }else{
                    $this->session->set_flashdata('notif', 'Gagal ubah data');
                    redirect('poin/index');
                }
            }else{
                $this->session->set_flashdata('notif', validation_errors());
                redirect('poin/index');
            }
        }else{
            redirect('login/index');
        }
    }
    public function get_data_poin_by_id($id)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $data = $this->poin_model->get_data_poin_by_id($id);
            echo json_encode($data);
        }else{
            redirect('login/index');
        }
    }
}
