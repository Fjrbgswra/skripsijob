<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alternatif extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('PelamarModel');
	}
	public function index()
	{
		$data['data'] = $this->PelamarModel->get();
		$this->load->view('admin/pelamar/template/header');
		$this->load->view('admin/pelamar/index',$data);
		$this->load->view('admin/pelamar/template/footer');
	}
	public function changestatus($id_pelamar,$status){
		$this->db->where('id_pelamar',$id_pelamar);
		$this->db->update('pelamar',array('status'=>$status));
		redirect('Admin/Alternatif');
	}
	public function insert()
	{
		$this->form_validation->set_rules('nama','nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('pendidikan','pendidikan',"required");
		$this->form_validation->set_rules('nama_sekolah','nama_sekolah',"required");
		$this->form_validation->set_rules('alamat','alamat',"required");
		$this->form_validation->set_rules('no_hp','no_hp',"required");
		$this->form_validation->set_rules('tanggal_lahir','tanggal_lahir',"required");
		$this->form_validation->set_rules('username','username',"required");
		$this->form_validation->set_rules('password','password',"required");
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin',"required");
		$this->load->model('PelamarModel');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('admin/pelamar/template/header');
			$this->load->view('admin/pelamar/insert');
			$this->load->view('admin/pelamar/template/footer');
		}
		else
		{

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

			);
			$this->db->insert('pelamar',$set);
			redirect('Admin/Alternatif','refresh');
		}		
	}
	public function update($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('nama','nama',"required|trim");
		$this->form_validation->set_rules('email','Email',"required");
		$this->form_validation->set_rules('pendidikan','pendidikan',"required");
		$this->form_validation->set_rules('nama_sekolah','nama_sekolah',"required");
		$this->form_validation->set_rules('alamat','alamat',"required");
		$this->form_validation->set_rules('no_hp','no_hp',"required");
		$this->form_validation->set_rules('tanggal_lahir','tanggal_lahir',"required");
		$this->form_validation->set_rules('username','username',"required");
		$this->form_validation->set_rules('password','password',"required");
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin',"required");

		if ($this->form_validation->run() == FALSE) {

			$data['pelamar'] = $this->PelamarModel->get_id($id);
			$this->load->view('admin/pelamar/template/header');
			$this->load->view('admin/pelamar/update',$data);
			$this->load->view('admin/pelamar/template/footer');
		} else{
				#get data
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
			);
			$this->db->where('id_pelamar',$id);
			$this->db->update('pelamar',$set);
			redirect('Admin/Alternatif','refresh');
		}
}
public function delete($id)
{
	$this->PelamarModel->delete($id);
	redirect('Admin/Alternatif','refresh');
}
}