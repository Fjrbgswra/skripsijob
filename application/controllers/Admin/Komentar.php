
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Komentar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('KomentarModel');

	}
	public function index()
	{
		$data['data'] = $this->KomentarModel->get();
		$this->load->view('admin/komentar/template/header');
		$this->load->view('admin/komentar/index',$data);
		$this->load->view('admin/komentar/template/footer');
	}
	public function insert()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama','Nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('keterangan','Keterangan',"required");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/komentar/template/header');
			$this->load->view('admin/komentar/insert');
			$this->load->view('admin/komentar/template/footer');
		} else {
			$this->KomentarModel->insert();
			redirect('Admin/Komentar','refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama','Nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('keterangan','Keterangan',"required");


		if ($this->form_validation->run() == FALSE) {
			$data['komentar'] = $this->KomentarModel->get_id($id);
			$this->load->view('admin/komentar/template/header');
			$this->load->view('admin/komentar/update',$data);
			$this->load->view('admin/komentar/template/footer');
		} else {
			$this->KomentarModel->update($id);
			redirect('Admin/Komentar','refresh');
		}
	}
	public function delete($id)
	{
		$this->KomentarModel->delete($id);
		redirect('Admin/Komentar','refresh');
	}
}
