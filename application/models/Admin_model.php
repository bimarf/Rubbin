<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_admin()
	{
        return $this->db->get('t_admin')
                        ->result();
	}
	public function hapus($id){
		$this->db->where('id_admin', $id)
				->delete(t_admin);
	}
	public function tambah()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$this->db->insert('t_admin', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function get_data_admin_by_id($id)
	{
		return $this->db->where('id_admin', $id)
						->get('t_admin')
						->row();
	}
	public function ubah()
	{
		$data = array(
				'nama'	=> $this->input->post('ubah_nama'),
				'username'	=> $this->input->post('ubah_username'),
				'password'	=> $this->input->post('ubah_password')
		);

		$this->db->where('id_admin', $this->input->post('ubah_id_admin'))
				->update('t_admin', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

}