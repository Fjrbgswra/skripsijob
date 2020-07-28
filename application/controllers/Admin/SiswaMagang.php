<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SiswaMagang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('SiswaModel');
	}
	public function index()
	{
		$data['data'] = $this->SiswaModel->get();
		$this->load->view('admin/siswa/template/header');
		$this->load->view('admin/siswa/index',$data);
		$this->load->view('admin/siswa/template/footer');
	}
	public function changestatus($id_siswa,$status){
		$this->db->where('id_siswa',$id_siswa);
		$this->db->update('siswa_magang',array('status'=>$status));
		redirect('Admin/SiswaMagang');
	}
	public function insert()
	{
		$data = array(
			'provinsi' => $this->SiswaModel->get_provinsi(),
			'kota' => $this->SiswaModel->get_kota(),
			'provinsi_selected' => '',
			'kota_selected' => '',
		);
		$this->form_validation->set_rules('nim_nisn','nim nisn',"required");
		$this->form_validation->set_rules('nama','nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('jurusan','jurusan',"required");
		$this->form_validation->set_rules('nama_instansi','nama_instansi',"required");
		$this->form_validation->set_rules('semester','semester',"required");
		$this->form_validation->set_rules('alamat','alamat',"required");
		$this->form_validation->set_rules('no_hp','no_hp',"required");
		$this->form_validation->set_rules('tempat_lahir','tempat_lahir',"required");
		$this->form_validation->set_rules('tanggal_lahir','tanggal_lahir',"required");
		$this->form_validation->set_rules('username','username',"required");
		$this->form_validation->set_rules('password','password',"required");
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin',"required");
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/siswa/template/header');
			$this->load->view('admin/siswa/insert', $data);
			$this->load->view('admin/siswa/template/footer');
		}
		else
		{
			if ( isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 )
			{
				$config['upload_path']          = './assets/uploads/siswa/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000000000000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('foto'))
				{
					$error = array('error' => $this->upload->display_errors('<p class="text-danger">','</p>'));
					$this->load->view('admin/siswa/template/header');
					$this->load->view('admin/siswa/insert',$error);
					$this->load->view('admin/siswa/template/footer');
				} else { //jika berhasil upload
					$img_data = $this->upload->data();
					$post_image = $img_data['file_name'];
				}
				}	else { //jika tidak upload foto
				$post_image = '';
			}
			$post_data = array(
				'nim_nisn' => $this->input->post('nim_nisn'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'jurusan' => $this->input->post('jurusan'),
				'nama_instansi' => $this->input->post('nama_instansi'),
				'semester' => $this->input->post('semester'),
				'alamat' => $this->input->post('alamat'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'foto' => $post_image,
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_hp' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			if( empty($data['upload_error']) ) {
				$this->SiswaModel->insert($post_data);
				redirect('Admin/SiswaMagang','refresh');
			}
		}
	}
	public function update($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nim_nisn','nim_nisn',"required|trim");
		$this->form_validation->set_rules('nama','nama',"required");
		$this->form_validation->set_rules('email','email',"required");
		$this->form_validation->set_rules('jurusan','jurusan',"required");
		$this->form_validation->set_rules('nama_instansi','nama_instansi',"required");
		$this->form_validation->set_rules('semester','semester',"required");
		$this->form_validation->set_rules('alamat','alamat',"required");
		$this->form_validation->set_rules('no_hp','no_hp',"required");
		$this->form_validation->set_rules('tempat_lahir','tempat_lahir',"required");
		$this->form_validation->set_rules('tanggal_lahir','tanggal_lahir',"required");
		$this->form_validation->set_rules('username','username',"required");
		$this->form_validation->set_rules('password','password',"required");
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin',"required");
		$this->form_validation->set_rules('fk_posisi_magang','fk_posisi_magang',"required");
		if ($this->form_validation->run() == FALSE) {
			$data['siswa_magang'] = $this->SiswaModel->get_id($id);
			$this->load->view('admin/siswa/template/header');
			$this->load->view('admin/siswa/update',$data);
			$this->load->view('admin/siswa/template/footer');
		} else {
			$config['upload_path'] = "./assets/uploads/siswa/";
			$config['allowed_types'] = "gif|jpg|png";
			$config['max_width'] = '10240';
			$config['max_height'] = '7680';
			$config['max_size'] = "2000";
			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('foto')) {
				$data['error'] = $this->upload->display_errors();
				$this->load->view('admin/siswa/template/header');
				$this->load->view('admin/siswa/index',$data);
				$this->load->view('admin/siswa/template/footer');
			}else{
				$upload_data = $this->upload->data();
				#get data
				$set = array(
					'nim_nisn' => $this->input->post('nim_nisn'),
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'jurusan' => $this->input->post('jurusan'),
					'nama_instansi' => $this->input->post('nama_instansi'),
					'semester' => $this->input->post('semester'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'foto' => $upload_data['file_name'],
					'fk_posisi_magang' => $this->input->post('fk_posisi_magang'),
				);
				$this->db->where('id_siswa',$id);
				$this->db->update('siswa_magang',$set);
			redirect('Admin/SiswaMagang','refresh');
		}
	}
}
	public function delete($id)
	{
		$this->SiswaModel->delete($id);
		redirect('Admin/SiswaMagang','refresh');
	}
}