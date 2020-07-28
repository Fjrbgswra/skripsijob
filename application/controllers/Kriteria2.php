<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria2 extends CI_Controller {

		public function __construct(){
			parent:: __construct();
			$this->load->helper('url','form');
			$this->load->library('form_validation');
			$this->load->model('kriteria_model2');
		}

		public function index()
		{ 		
			$object['kriteria_object']=$this->kriteria_model2->getDataKriteria();
			$this->load->view('admin/kriteria2/template/header');
			$this->load->view('admin/kriteria2/kriteria',$object);
			$this->load->view('admin/kriteria2/template/footer');
		}

		public function create()
		{
			$this->load->helper('url','form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nama_kriteria','nama_kriteria','trim|required');
			$this->form_validation->set_rules('tipe','tipe','trim|required');
			$this->form_validation->set_rules('bobot','bobot','trim|required');

			$this->load->model('kriteria_model2');
		
			if($this->form_validation->run()==FALSE)
			{

				$this->load->view('admin/kriteria2/template/header');
				$this->load->view('admin/kriteria2/insert');
				$this->load->view('admin/kriteria2/template/footer');
			}
			else
			{
				$this->kriteria_model2->insertKriteriaBaru();
				$this->load->view('admin/kriteria2/template/header');
				echo '<script type="text/javascript">alert("Data Berhasil di ditambahkan!")</script>';
					redirect('Kriteria2', 'refresh');
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
			$data['kriteria']=$this->kriteria_model2->getKriteria($kriteria);
			if ($this->form_validation->run()==FALSE) 
			{
				$this->load->view('admin/kriteria2/template/header');
				$this->load->view('admin/kriteria2/update',$data);
				$this->load->view('admin/kriteria2/template/footer');
				
			}
			else
			{
				$this->kriteria_model2->UpdateById($kriteria);
				$this->load->view('admin/kriteria2/template/header');
				echo '<script type="text/javascript">alert("Data Berhasil di ubah!")</script>';
					redirect('Kriteria2', 'refresh');
				
			}

		}

		public function delete($kriteria)
		{
			$this->load->view('admin/kriteria2/template/header');
			$this->kriteria_model2->delete($kriteria);
			echo '<script type="text/javascript">alert("Data Berhasil di hapus!!")</script>';
					redirect('Kriteria2', 'refresh');
			
		}

		

	

}
?>
