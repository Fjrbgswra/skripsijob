<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home2 extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in_user')){
			if($this->session->userdata('logged_in_user')['status'] == 3){
				echo '<script>alert("Akun anda telah terkonfirmasi, Silahkan melanjutkan dengan pengisian data")</script>';
				$this->db->where('id_pelamar',$this->session->userdata('logged_in_user')['id_pelamar']);
				$this->db->update('pelamar',array('status'=>1));
			}
		}
		$this->load->view('user/index2');
	}
}
