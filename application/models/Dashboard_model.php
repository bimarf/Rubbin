<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function get_jml_user(){
        return $this->db->select('count(*) as jml_user')
                        ->get('user')
                        ->row();
    }
    public function get_jumlah_sampah(){
        return $this->db->select('sum(jumlah_sampah) as jml_sampah')
                        ->get('tabungan')
                        ->row();
    }
    public function get_jumlah_reward(){
        return $this->db->select('count(*) as jml_reward')
                        ->get('reward')
                        ->row();
    }
    public function get_jumlah_transaksi(){
        return $this->db->select('count(*) as jml_trs')
                        ->get('tabungan')
                        ->row();
    }
}