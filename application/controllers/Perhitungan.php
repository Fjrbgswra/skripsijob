<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

		public function __construct(){
		parent:: __construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kriteria_model');
		$this->load->model('alternatif_model');
		$this->load->model('nilai_model');	
		$this->load->model('perhitungan_model');		
		}

		public function index()
		{ 		
			
			$object['kriteria']=$this->perhitungan_model->get_kriteria();
			$object['alternatif']=$this->perhitungan_model->penilaian_alternatif();
			$object['penilaian']=$this->perhitungan_model->get_penilaian();
			$this->load->view('admin/ranking/template/header');
			$this->load->view('admin/ranking/ranking',$object);
			$this->load->view('admin/ranking/template/footer');
			
			
			
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
