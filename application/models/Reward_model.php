<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward_model extends CI_Model {

	public function get_reward()
	{
        return $this->db->get('reward')
                        ->result();
	}

	public function hapus($id)
	{
		$this->db->where('id_reward',$id)
				->delete('reward');
	}
	public function tambah()
	{
		$data = array(
			'nama_reward' => $this->input->post('nama_reward'),
			'harga_poin' => $this->input->post('harga_poin')
		);

		$this->db->insert('reward', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function get_data_reward_by_id($id)
	{
		return $this->db->where('id_reward', $id)
						->get('reward')
						->row();
	}
	public function ubah()
	{
		$data = array(
				'nama_reward'	=> $this->input->post('ubah_nama_reward'),
				'harga_poin'	=> $this->input->post('ubah_harga_poin')
		);

		$this->db->where('id_reward', $this->input->post('ubah_id_reward'))
				->update('reward', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}