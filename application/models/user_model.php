<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get_sum()
	{
		$this->db->sum();
	}
	public function get_user()
	{
        return $this->db->get('user')
                        ->result();
	}

	public function hapus($id)
	{
		$this->db->where('id_user',$id)
				->delete('user');
	}
	public function tambah()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'kelas' => $this->input->post('kelas')
		);

		$this->db->insert('user', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function get_data_user_by_id($id)
	{
		return $this->db->where('id_user', $id)
						->get('user')
						->row();
	}
	public function ubah()
	{
		$data = array(
			'nama' => $this->input->post('ubah_nama'),
			'username' => $this->input->post('ubah_username'),
			'password' => $this->input->post('ubah_password'),
			'email' => $this->input->post('ubah_email'),
			'kelas' => $this->input->post('ubah_kelas')
		);

		$this->db->where('id_user', $this->input->post('ubah_id_user'))
				->update('user', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}