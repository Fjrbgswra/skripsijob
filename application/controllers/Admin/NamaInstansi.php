
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class NamaInstansi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('NamaInstansiModel');

	}
	public function index()
	{
		$data['data'] = $this->NamaInstansiModel->get();
		$this->load->view('admin/nama_instansi/template/header');
		$this->load->view('admin/nama_instansi/index',$data);
		$this->load->view('admin/nama_instansi/template/footer');
	}
	public function insert()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama_instansi','Nama_instansi',"required|trim");
		$this->form_validation->set_rules('alamat','Alamat',"required");
		$this->form_validation->set_rules('no_hp','No_hp',"required");
		$this->form_validation->set_rules('fk_id_siswa','ID Siswa',"required");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/nama_instansi/template/header');
			$this->load->view('admin/nama_instansi/insert');
			$this->load->view('admin/nama_instansi/template/footer');
		} else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('logo_instansi')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/nama_instansi/template/header');
				$this->load->view('admin/nama_instansi/insert');
				$this->load->view('admin/nama_instansi/template/footer');
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				$this->NamaInstansiModel->insert($data['upload_data']['file_name']);
				redirect('Admin/NamaInstansi','refresh');
			}

		}
	}
	public function update($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama_instansi','nama_instansi',"required|trim");
		$this->form_validation->set_rules('alamat','alamat',"required");
		$this->form_validation->set_rules('no_hp','no_hp',"required");
		$this->form_validation->set_rules('fk_id_siswa','fk_id_siswa',"required");

		if ($this->form_validation->run() == FALSE) {
			$data['nama_instansi'] = $this->NamaInstansiModel->get_id($id);
			$this->load->view('admin/nama_instansi/template/header');
			$this->load->view('admin/nama_instansi/update',$data);
			$this->load->view('admin/nama_instansi/template/footer');
		} else {
			$config['upload_path'] = "./assets/uploads/nama_instansi/";
			$config['allowed_types'] = "gif|jpg|png";
			$config['max_width'] = '10240';
			$config['max_height'] = '7680';
			$config['max_size'] = "2000";

			$this->load->library('upload',$config);

			if (!$this->upload->do_upload('gambar')) {
				$data['error'] = $this->upload->display_errors();
				$this->load->view('admin/nama_instansi/index',$data);
			}else{
				$upload_data = $this->upload->data();
				#get data
				$set = array(
					'nama_instansi' => $this->input->post('nama_instansi'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp'),
					'gambar' => $upload_data['file_name'],
					'fk_id_siswa' => $this->input->post('fk_id_siswa')
				);

				$this->db->where('id_instansi',$id);
				$this->db->update('nama_instansi',$set);

			redirect('Admin/NamaInstansi','refresh');
		}
	}


}
	public function delete($id)
	{
		$this->NamaInstansiModel->delete($id);
		redirect('Admin/NamaInstansi','refresh');
	}
}
