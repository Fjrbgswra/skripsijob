<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('AdministratorModel');

	}
	public function index()
	{
		$data['data'] = $this->AdministratorModel->get();
		$this->load->view('admin/administrator/template/header');
		$this->load->view('admin/administrator/index',$data);
		$this->load->view('admin/administrator/template/footer');
	}
	public function insert()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama','Nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('username','Username',"required|trim");
		$this->form_validation->set_rules('password','Password',"required");
		$this->form_validation->set_rules('fk_id_level','ID Level',"required");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/administrator/template/header');
			$this->load->view('admin/administrator/insert');
			$this->load->view('admin/administrator/template/footer');
		} else {
			$this->AdministratorModel->insert();
			redirect('Admin/Administrator','refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama','Nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('username','Username',"required|trim");
		$this->form_validation->set_rules('password','Password',"required");
		
		if ($this->form_validation->run() == FALSE) {
			$data['administrator'] = $this->AdministratorModel->get_id($id);
			$this->load->view('admin/administrator/template/header');
			$this->load->view('admin/administrator/update',$data);
			$this->load->view('admin/administrator/template/footer');
		} else {
			$this->AdministratorModel->update($id);
			redirect('Admin/Administrator','refresh');
		}
	}
	public function delete($id)
	{
		$this->AdministratorModel->delete($id);
		redirect('Admin/Administrator','refresh');
	}
}
