<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Absensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('AbsensiModel');
		$this->load->helper('form');


	}
	public function index()
	{
		$data['data'] = $this->AbsensiModel->get();
		if($this->session->userdata('logged_in_user')){
			$this->load->view('admin/absensi/template/header_user');
		}if($this->session->userdata('logged_in_pendamping')){
			$this->load->view('admin/absensi/template/header_pendamping');
		}else{
			$this->load->view('admin/absensi/template/header');
		}
		if($this->session->userdata('logged_in_user')){
			$this->load->view('admin/absensi/index_user',$data);
		}if($this->session->userdata('logged_in_pendamping')){
			$this->load->view('admin/absensi/index_pendamping',$data);
		}else{
			$this->load->view('admin/absensi/index',$data);
		}
		$this->load->view('admin/absensi/template/footer');
	}
	public function report($id_siswa)
	{
		$data['data'] = $this->AbsensiModel->get_report_siswa($id_siswa);
		$this->load->view('admin/absensi/template/header');
		$this->load->view('admin/absensi/report',$data);
		$this->load->view('admin/absensi/template/footer');
	}
	public function insert()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('tanggal','Tanggal',"required|trim");
		$this->form_validation->set_rules('datang','Datang',"required");
		$this->form_validation->set_rules('pulang','Pulang',"required");
		$this->form_validation->set_rules('aktivitas','aktivitas',"required");
		$this->form_validation->set_rules('keterangan','Keterangan',"required");
		$this->form_validation->set_rules('fk_id_siswa','ID Siswa',"required");
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('logged_in_user')){
				$this->load->view('admin/absensi/template/header_user');
			}if($this->session->userdata('logged_in_pendamping')){
				$this->load->view('admin/absensi/template/header_pendamping');
			}else{
				$this->load->view('admin/absensi/template/header');
			}	$this->load->view('admin/absensi/insert');
			$this->load->view('admin/absensi/template/footer');
		} else {
			$this->AbsensiModel->insert();
			redirect('Admin/Absensi','refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p');
		$this->form_validation->set_rules('tanggal','Tanggal',"required|trim");
		$this->form_validation->set_rules('datang','Datang',"required");
		$this->form_validation->set_rules('pulang','Pulang',"required");
		$this->form_validation->set_rules('aktivitas','aktivitas',"required");
		$this->form_validation->set_rules('keterangan','Keterangan',"required");
		$this->form_validation->set_rules('fk_id_siswa','ID Siswa',"required");


		if ($this->form_validation->run() == FALSE) {
			$data['absensi'] = $this->AbsensiModel->get_id($id);
			$this->load->view('admin/absensi/template/header');
			$this->load->view('admin/absensi/update',$data);
			$this->load->view('admin/absensi/template/footer');
		} else {
			$this->AbsensiModel->update($id);
			redirect('Admin/Absensi','refresh');
		}
	}
	public function delete($id)
	{
		$this->AbsensiModel->delete($id);
		redirect('Admin/Absensi','refresh');
	}
}
