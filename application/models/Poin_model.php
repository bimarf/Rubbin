<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin_model extends CI_Model {

	public function get_poin()
	{
        return $this->db->get('poin')
                        ->result();
        }
        
        public function hapus($id)
	{
		$this->db->where('id_poin',$id)
				->delete('poin');
        }
        public function tambah()
	{
		$data = array(
                        'jumlah' => $this->input->post('jumlah'),
                        'jenis' => $this->input->post('jenis')
		);

		$this->db->insert('poin', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function get_data_poin_by_id($id)
	{
		return $this->db->where('id_poin', $id)
						->get('poin')
						->row();
	}
	public function ubah()
	{
		$data = array(
				'jenis'	=> $this->input->post('ubah_jenis'),
				'jumlah'	=> $this->input->post('ubah_jumlah')
		);

		$this->db->where('id_poin', $this->input->post('ubah_id_poin'))
				->update('poin', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

}