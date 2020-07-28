<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Portofolio extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

	}
	public function index()
	{
		$data['data'] = $this->db->get('portofolio')->result();
		$this->load->view('admin/portofolio/template/header');
		$this->load->view('admin/portofolio/index',$data);
		$this->load->view('admin/portofolio/template/footer');
	}

	public function insert()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('judul','judul',"required|trim");
		$this->form_validation->set_rules('deskripsi','deskripsi',"required|trim");

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/portofolio/template/header');
			$this->load->view('admin/portofolio/insert');
			$this->load->view('admin/portofolio/template/footer');
		}
		else
		{
			// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
			$config['upload_path']          = './assets/uploads/portofolio/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000000000000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar'))
			{
				$error = array('error' => $this->upload->display_errors('<p class="text-danger">','</p>'));
				$this->load->view('admin/portofolio/template/header');
				$this->load->view('admin/portofolio/insert',$error);
				$this->load->view('admin/portofolio/template/footer');
				} else { //jika berhasil upload
					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];

					$post_data = array(
						'judul' => $this->input->post('judul'),
						'gambar' => $post_image,
						'deskripsi' => $this->input->post('deskripsi')
					);

					$this->db->insert('portofolio',$post_data);
					redirect('Admin/portofolio','refresh');
				}

			}
		}
		public function update($id)
		{
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
			$this->form_validation->set_rules('judul','judul',"required|trim");
			$this->form_validation->set_rules('deskripsi','deskripsi',"required|trim");

			if ($this->form_validation->run() == FALSE)
			{
				$data['portofolio_magang'] = $this->db->where('id',$id)->get('portofolio')->row(0);
				$this->load->view('admin/portofolio/template/header');
				$this->load->view('admin/portofolio/update',$data);
				$this->load->view('admin/portofolio/template/footer');
			}
			else
			{
				if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
				{
				// Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
					$config['upload_path']          = './assets/uploads/portofolio/';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 10000000000000;
					$config['max_width']            = 5000;
					$config['max_height']           = 5000;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('gambar'))
					{
						$error = array('error' => $this->upload->display_errors('<p class="text-danger">','</p>'));
						$this->load->view('admin/portofolio/template/header');
						$this->load->view('admin/portofolio/update',$error);
						$this->load->view('admin/portofolio/template/footer');
				} else { //jika berhasil upload
					$upload_data = $this->upload->data();
					
					$set = array(
						'judul' => $this->input->post('judul'),
						'gambar' =>  $upload_data['file_name'],
						'deskripsi' => $this->input->post('deskripsi')
					);

					$this->db->where('id',$id);
					$this->db->update('portofolio',$set);
					redirect('Admin/portofolio','refresh');
				}
			}
		}
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('portofolio');
		redirect('Admin/portofolio','refresh');
	}
}
