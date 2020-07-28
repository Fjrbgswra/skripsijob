
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('KriteriaModel');

	}
	public function index()
	{
		$data['data'] = $this->KriteriaModel->get();
		$this->load->view('admin/Kriteria/template/header');
		$this->load->view('admin/Kriteria/kriteria',$data);
		$this->load->view('admin/Kriteria/template/footer');
	}
	public function insert()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama','Nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('no_hp','no_hp',"required|trim");
		$this->form_validation->set_rules('username','Username',"required|trim");
		$this->form_validation->set_rules('password','Password',"required");
		$this->form_validation->set_rules('fk_id_level','ID Level',"required");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/pendamping/template/header');
			$this->load->view('admin/pendamping/insert');
			$this->load->view('admin/pendamping/template/footer');
		} else {
			$this->PendampingModel->insert();
			redirect('Admin/Pendamping_magang','refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama','Nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('no_hp','no_hp',"required|trim");
		$this->form_validation->set_rules('username','Username',"required|trim");
		$this->form_validation->set_rules('password','Password',"required");
		$this->form_validation->set_rules('fk_id_level','ID Level',"required");


		if ($this->form_validation->run() == FALSE) {
			$data['pendamping_magang'] = $this->PendampingModel->get_id($id);
			$this->load->view('admin/pendamping/template/header');
			$this->load->view('admin/pendamping/update',$data);
			$this->load->view('admin/pendamping/template/footer');
		} else {
			$this->PendampingModel->update($id);
			redirect('Admin/PendampingMagang','refresh');
		}
	}
	public function delete($id)
	{
		$delete = $this->PendampingModel->delete($id);

		redirect('Admin/PendampingMagang','refresh');
	}
	public function detail($id_pendamping)
	{
		$data['data'] = $this->db->where('fk_id_pendamping',$id_pendamping)->get('siswa_magang')->result();
		$this->load->view('admin/pendamping/template/header');
		$this->load->view('admin/pendamping/index_detail',$data);
		$this->load->view('admin/pendamping/template/footer');
	}
	
	public function insert_detail($id_pendamping)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('id_siswa','Siswa',"required|trim");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/pendamping/template/header');
			$this->load->view('admin/pendamping/insert_detail');
			$this->load->view('admin/pendamping/template/footer');
		} else {
			$set = [
				'fk_id_pendamping' => $id_pendamping,
			];
			$this->db->where('id_siswa',$this->input->post('id_siswa'));
			$this->db->update('siswa_magang',$set);
			redirect('Admin/PendampingMagang','refresh');
		}
	}
	public function delete_detail($id)
	{
		$set = [
			'fk_id_pendamping' => null,
		];
		$this->db->where('id_siswa',$id);
		$this->db->update('siswa_magang',$set);
		redirect('Admin/PendampingMagang','refresh');
	}
}
