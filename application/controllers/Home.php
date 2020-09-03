<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}
	public function index()
	{
		

		$data['main_view']="dashboard_view";
		$data['jml_user'] = $this->dashboard_model->get_jml_user();
		$data['jml_sampah'] = $this->dashboard_model->get_jumlah_sampah();
		$data['jml_reward'] = $this->dashboard_model->get_jumlah_reward();
		$data['jml_trs'] = $this->dashboard_model->get_jumlah_transaksi();
		$this->load->view('Template', $data);

	}
}