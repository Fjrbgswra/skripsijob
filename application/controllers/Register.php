<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index($id = null)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama',"Nama","required");
		$data = [
			'posisi' => $this->db->where('id_posisi',$id)->get('posisi_kerja')->row(0),
		];
		if ($this->form_validation->run() == false) {
			$this->load->view('user/register',$data);
		}else{
			$set = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'pendidikan' => $this->input->post('pendidikan'),
				'nama_sekolah' => $this->input->post('nama_sekolah'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'fk_posisi_magang' => $id,
			);

			$this->db->insert('pelamar',$set);
			$this->session->set_flashdata('message',"Terima Kasih telah mendaftarkan diri anda, silahkan login untuk melihat konfirmasi penerimaan");
			redirect('Home');
		}
	}
}
