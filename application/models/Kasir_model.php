<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model {

	public function get_kasir()
	{
        return $this->db->select('user.nama as user, t_sampah.nama as sampah,poin.jumlah as poin_sampah, jumlah_sampah, waktu, jumlah_poin')
                        ->join('user','user.id_user = tabungan.id_user')->join('t_sampah','t_sampah.id_sampah=tabungan.id_sampah')->join('poin','poin.id_poin=tabungan.id_poin')
                        ->get('tabungan')
                        ->result();
	}

	public function hapus($id)
	{
		$this->db->where('id_tabungan',$id)
				->delete('tabungan');
	}
	public function tambah()
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),
            'id_sampah' => $this->input->post('id_sampah'),
            'id_poin' => $this->input->post('id_poin'),
            'jumlah_sampah' => $this->input->post('jumlah_sampah'),
            'waktu' => $this->input->post('waktu'),
            'jumlah_poin' => $this->input->post('jumlah_poin')
		);

		$this->db->insert('tabungan', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}else {
			return FALSE;
		}
	}
}