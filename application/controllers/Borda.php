<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borda extends CI_Controller {

		public function __construct(){
		parent:: __construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kriteria_model2');
		$this->load->model('kriteria_model');
		$this->load->model('alternatif_model');
		$this->load->model('nilai_model2');	
		$this->load->model('nilai_model');	
		$this->load->model('perhitungan_model2');
		$this->load->model('perhitungan_model');
		}

		public function index()
		{ 		
			
			$object['kriteria2']=$this->perhitungan_model2->get_kriteria();
			$object['alternatif2']=$this->perhitungan_model2->penilaian_alternatif();
			$object['penilaian2']=$this->perhitungan_model2->get_penilaian();
			
			$object['kriteria']=$this->perhitungan_model->get_kriteria();
			$object['alternatif']=$this->perhitungan_model->penilaian_alternatif();
			$object['penilaian']=$this->perhitungan_model->get_penilaian();
			$this->load->view('admin/ranking3/template/header');
			$this->load->view('admin/ranking3/ranking',$object);
			$this->load->view('admin/ranking3/template/footer');		
		}

		private function pre($arr)
		{
			echo "<pre>";
			print_r($arr);
			echo "</pre>";
			die;
		}	

}


?>
