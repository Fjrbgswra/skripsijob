<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kriteria_model');
	}

	public function index()
	{ 		
		$object['kriteria_object']=$this->kriteria_model->getDataKriteria();
		$this->load->view('admin/kriteria/template/header');
		$this->load->view('admin/kriteria/kriteria',$object);
		$this->load->view('admin/kriteria/template/footer');
	}

	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kriteria','nama_kriteria','trim|required');
		$this->form_validation->set_rules('tipe','tipe','trim|required');
		$this->form_validation->set_rules('bobot','bobot','trim|required');
		$this->load->model('kriteria_model');
		
		if($this->form_validation->run()==FALSE)
		{

			$this->load->view('admin/kriteria/template/header');
			$this->load->view('admin/kriteria/insert');
			$this->load->view('admin/kriteria/template/footer');
		}
		else
		{
			$this->kriteria_model->insertKriteriaBaru();
			$this->load->view('admin/kriteria/template/header');
			echo '<script type="text/javascript">alert("Data Berhasil di ditambahkan!")</script>';
			redirect('Kriteria', 'refresh');
		}		
	}

	public function update($kriteria)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kriteria','nama_kriteria','trim|required');
		$this->form_validation->set_rules('tipe','tipe','trim|required');
		$this->form_validation->set_rules('bobot','bobot','trim|required');
		$this->load->model('kriteria_model');
		$data['kriteria']=$this->kriteria_model->getKriteria($kriteria);

		if ($this->form_validation->run()==FALSE) 
		{
			$this->load->view('admin/kriteria/template/header');
			$this->load->view('admin/kriteria/update',$data);
			$this->load->view('admin/kriteria/template/footer');

		}
		else
		{
			$this->kriteria_model->UpdateById($kriteria);
			$this->load->view('admin/kriteria/template/header');
			echo '<script type="text/javascript">alert("Data Berhasil di ubah!")</script>';
			redirect('Kriteria', 'refresh');
		}

	}

	public function delete($kriteria)
	{
		$this->load->view('admin/kriteria/template/header');
		$this->kriteria_model->delete($kriteria);
		echo '<script type="text/javascript">alert("Data Berhasil di hapus!!")</script>';
		redirect('Kriteria', 'refresh');

	}
}
?>
