<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan2 extends CI_Controller {

		public function __construct(){
		parent:: __construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kriteria_model2');
		$this->load->model('alternatif_model');
		$this->load->model('nilai_model2');	
		$this->load->model('perhitungan_model2');		
		}

		public function index()
		{ 		
			
			$object['kriteria']=$this->perhitungan_model2->get_kriteria();
			$object['alternatif']=$this->perhitungan_model2->penilaian_alternatif();
			$object['penilaian']=$this->perhitungan_model2->get_penilaian();
			$this->load->view('admin/ranking2/template/header');
			$this->load->view('admin/ranking2/ranking',$object);
			$this->load->view('admin/ranking2/template/footer');		
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
