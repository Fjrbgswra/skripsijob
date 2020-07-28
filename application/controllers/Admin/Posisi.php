<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Posisi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('PosisiModel');
		$this->load->helper('form');

	}
	public function index()
	{
		$data['data'] = $this->PosisiModel->get();
		$this->load->view('admin/posisi/template/header');
		$this->load->view('admin/posisi/index',$data);
		$this->load->view('admin/posisi/template/footer');
	}
	public function insert()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama_posisi','nama_posisi',"required|trim");
		$this->form_validation->set_rules('keterangan','Keterangan',"required");
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/posisi/template/header');
			$this->load->view('admin/posisi/insert');
			$this->load->view('admin/posisi/template/footer');
		}
		else
		{
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/posisi/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000000000000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error = array('error' => $this->upload->display_errors('<p class="text-danger">','</p>'));
					$this->load->view('admin/posisi/template/header');
					$this->load->view('admin/posisi/insert',$error);
					$this->load->view('admin/posisi/template/footer');
				} else { //jika berhasil upload

					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];
					$post_data = array(
						'nama_posisi' => $this->input->post('nama_posisi'),
						'fk_id_divisi' => $this->input->post('fk_id_divisi'),
						'gambar' =>$post_image,
						'keterangan' => $this->input->post('keterangan'),

					);
				}


				$this->db->insert('posisi_kerja',$post_data);
				redirect('Admin/Posisi','refresh');
			}
		}
	}


	public function update($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama_posisi','nama_posisi',"required|trim");
		$this->form_validation->set_rules('keterangan','Keterangan',"required");

		if ($this->form_validation->run() == FALSE) {

			$data['posisi_kerja'] = $this->db->where('id_posisi',$id)->get('posisi_kerja')->row(0);

			$this->load->view('admin/posisi/template/header');
			$this->load->view('admin/posisi/update',$data);
			$this->load->view('admin/posisi/template/footer');
		} else {
			if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
			{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
				$config['upload_path']          = './assets/uploads/posisi/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000000000000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('gambar'))
				{
					$error = array('error' => $this->upload->display_errors('<p class="text-danger">','</p>'));
					$this->load->view('admin/posisi/template/header');
					$this->load->view('admin/posisi/indexs',$error);
					$this->load->view('admin/posisi/template/footer');
				} else { //jika berhasil upload


					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

					$post_data = array(
						'nama_posisi' => $this->input->post('nama_posisi'),
						'fk_id_divisi' => $this->input->post('fk_id_divisi'),
						'gambar' =>$post_image,
						'keterangan' => $this->input->post('keterangan'),

					);
				

				$this->db->where('id_posisi',$id);
				$this->db->update('posisi_kerja',$post_data);

				redirect('Admin/Posisi','refresh');
			}
		}
	}
}
	public function delete($id)
	{
		$this->PosisiModel->delete($id);
		redirect('Admin/Posisi','refresh');
	}
}
