<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

		public function __construct(){
		parent:: __construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('alternatif_model');
		$this->load->model('nilai_model');
		
		}

		public function index()
		{ 		
			$object['alternatif_object']=$this->alternatif_model->getDataAlternatifByUser();
			$this->load->view('admin/alternatif/template/header');
			$this->load->view('admin/alternatif/alternatif',$object);
			$this->load->view('admin/alternatif/template/footer');
		}

		public function create()
		{
			$this->load->helper('url','form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama_alternatif','nama_alternatif','trim|required');
			$this->load->model('alternatif_model');
		
			if($this->form_validation->run()==FALSE)
			{
			$this->load->view('admin/alternatif/template/header');
			$this->load->view('admin/alternatif/insert');
			$this->load->view('admin/alternatif/template/footer');
			}
			else
			{
				$last_data = $this->alternatif_model->GetLastData();
				$last_id = $last_data->id_alternatif + 1;
				$this->alternatif_model->insertAlternatifBaru($last_id);
				$this->load->view('admin/alternatif/template/header');
				echo '<script type="text/javascript">alert("Data Berhasil di ditambahkan!!")</script>';
					redirect('Alternatif', 'refresh');
			}		
		}

		public function update($id_alternatif)
		{
			$this->load->helper('url','form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama_alternatif', 'nama_alternatif', 'trim|required');
			
			$this->load->model('alternatif_model');
			$data['personel']=$this->alternatif_model->getAlternatif($id_alternatif);

			// var_dump($data);

			if ($this->form_validation->run()==FALSE) 
			{
			$this->load->view('admin/alternatif/template/header');
			$this->load->view('admin/alternatif/update',$data);
			$this->load->view('admin/alternatif/template/footer');
				
			}
			else
			{
				// helper_log("edit", "mengubah data personel");
				$this->alternatif_model->UpdateById($id_alternatif);
				$this->load->view('admin/alternatif/template/header');
				echo '<script type="text/javascript">alert("Data Berhasil di ubah!!")</script>';
					redirect('Alternatif', 'refresh');
				
			}

		}

		public function delete($id_alternatif)
		{
			$this->load->view('admin/alternatif/template/header');
			// helper_log("delete", "menghapus data personel");
			$this->alternatif_model->delete($id_alternatif);
			$this->nilai_model->deleteByAlternatif($id_alternatif);

			echo '<script type="text/javascript">alert("Data Berhasil di hapus!!")</script>';
					redirect('Alternatif', 'refresh');
			
		}

		

	

}

/* End of file Home.php */
/* Location: ./application/controllers/Seleksi_baru.php */
?>
