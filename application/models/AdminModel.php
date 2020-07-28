<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

    public function login($username, $password)
    {
       $this->db->where('username', $username);
       $this->db->where('password', $password);
       $result = $this->db->get('administrator');
       if($result->num_rows() == 1){
           $data['id_administrator'] = $result->row(0)->id_administrator;
           $data['fk_id_level'] = $result->row(0)->fk_id_level;
           return $data;
       } else {
           return false;
       }
   }

}
