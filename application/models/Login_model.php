<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function cek_user(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $query = $this->db->where('username',$username)
                          ->where('password',$password)
                          ->get('t_admin');

        if($this->db->affected_rows() > 0){

            $data_login = $query->row();

            $data_session = array(
                                'username'=> $data_login->username,
                                'password'=> $data_login->password,
                                'logged_in'=> TRUE,
                                'nama_level'=> $data_login->nama_level
            );
            $this->session->set_userdata($data_session);

            return TRUE;
        }else{
            return FALSE;
        }
    }


}
