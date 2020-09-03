<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['main_view']="Dashboard_user";
		$this->load->view('Dashboard_user', $data);
	}
}