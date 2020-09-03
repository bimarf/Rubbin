<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampah_model extends CI_Model {

	public function get_sampah()
	{
		return $this->db->join('poin', 'poin.id_poin = t_sampah.id_poin')
						->get('t_sampah')
                        ->result();
	}
	public function get_poin()
	{
        return $this->db->join('poin','t_sampah.id_poin= poin.id_poin')
                        ->get('t_sampah')
                        ->result();
        }

	public function hapus($id)
	{
		$this->db->where('id_sampah',$id)
				->delete('t_sampah');
	}
	public function tambah()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'id_poin' => $this->input->post('id_poin')
		);

		$this->db->insert('t_sampah', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function get_data_sampah_by_id($id)
	{
		return $this->db->where('id_sampah', $id)
						->get('t_sampah')
						->row();
	}
	public function ubah()
	{
		$data = array(
				'nama'	=> $this->input->post('ubah_nama'),
		);

		$this->db->where('id_sampah', $this->input->post('ubah_id_sampah'))
				->update('t_sampah', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}


}