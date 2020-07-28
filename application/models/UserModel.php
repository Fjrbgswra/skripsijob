<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function login($username, $password)
    {
       $this->db->where('username', $username);
       $this->db->where('password', $password);
       $result = $this->db->get('siswa_magang');
       if($result->num_rows() == 1){
           $data['id_siswa'] = $result->row(0)->user_id;
           $data['level'] = $result->row(0)->level;
           return $data;
       } else {
           return false;
       }
   }

}
