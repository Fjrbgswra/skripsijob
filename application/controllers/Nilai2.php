<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai2 extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('nilai_model2');
		$this->load->model('alternatif_model');
		$this->load->model('kriteria_model2');
		$this->load->model('PelamarModel');
	}

	public function index()
	{ 		
		$object['alternatif']=$this->PelamarModel->getDataAlternatifByUser();
		$object['nilai_object']=$this->nilai_model2->get_alternatif_from_nilai();
		$this->load->view('admin/nilai2/template/header');
		$this->load->view('admin/nilai2/nilai',$object);
		$this->load->view('admin/nilai2/template/footer');
	}

	public function detail($id){
		$object['nilai_object']=$this->nilai_model2->getDataNilaiDetail($id);
		$this->load->view('admin/nilai2/template/header');
		$this->load->view('admin/nilai2/detail',$object);
		$this->load->view('admin/nilai2/template/footer');
	}

	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('type','Type','required|is_unique[nilai2.id_pelamar]');
		$this->form_validation->set_rules('kriteria1','kriteria1','trim|required');
		$this->form_validation->set_rules('kriteria2','kriteria2','trim|required');
		$this->form_validation->set_rules('kriteria3','kriteria3','trim|required');
		$this->form_validation->set_rules('kriteria4','kriteria4','trim|required');
		$this->form_validation->set_rules('kriteria5','kriteria5','trim|required');
		$this->form_validation->set_rules('kriteria6','kriteria6','trim|required');
		$this->form_validation->set_rules('kriteria7','kriteria7','trim|required');

		if($this->form_validation->run()==FALSE)
		{

			$data = array('karyawan' => $this->PelamarModel->getDataAlternatif());
			$this->load->view('admin/nilai2/template/header');
			$this->load->view('admin/nilai2/insert',$data);
			$this->load->view('admin/nilai2/template/footer');	
		}
		else
		{
			for ($i=1; $i <= 7; $i++) { 
				$val = 'kriteria'.$i;
				$object = array(
					'id_pelamar' =>$this->input->post('type'),
					'id_kriteria' =>$i,
					'nilai' =>$this->input->post($val),
				);
				$this->nilai_model2->insertNilaiBaru($object);					
			}
			$this->load->view('admin/nilai2/template/header');
			echo '<script type="text/javascript">alert("Data Berhasil di ditambahkan!!")</script>';
			redirect('Nilai2', 'refresh');
		}		
	}

	public function create_user_kedua()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('type','Type','required|is_unique[nilai2.id_pelamar]');
		$this->form_validation->set_rules('kriteria1','kriteria1','trim|required');
		$this->form_validation->set_rules('kriteria2','kriteria2','trim|required');
		$this->form_validation->set_rules('kriteria3','kriteria3','trim|required');
		$this->form_validation->set_rules('kriteria4','kriteria4','trim|required');
		$this->form_validation->set_rules('kriteria5','kriteria5','trim|required');
		$this->form_validation->set_rules('kriteria6','kriteria6','trim|required');
		$this->form_validation->set_rules('kriteria7','kriteria7','trim|required');

		if($this->form_validation->run()==FALSE)
		{

			$data = array('karyawan' => $this->PelamarModel->getDataAlternatif());
			$this->load->view('admin/nilai_user/template/header');
			$this->load->view('admin/nilai_user/insert2',$data);
			$this->load->view('admin/nilai_user/template/footer');	
		}
		else
		{
			for ($i=1; $i <= 7; $i++) { 
				$val = 'kriteria'.$i;
				$object = array(
					'id_pelamar' =>$this->input->post('type'),
					'id_kriteria' =>$i,
					'nilai' =>$this->input->post($val),
				);
				$this->nilai_model2->insertNilaiBaru($object);					
			}
			echo '<script type="text/javascript">alert("Data Berhasil di ditambahkan, Silahkan menunggu untuk pemberitahuan selanjutnya!!")</script>';
			redirect('Home2', 'refresh');
		}		
	}

	public function update($id_nilai)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nilai','nilai','trim|required');

		$this->load->model('nilai_model2');
		$data['nilai']=$this->nilai_model2->getNilai($id_nilai);
		$pelamar=$this->nilai_model2->getNilai($id_nilai);
		foreach($pelamar as $key){
			$id_pelamar = $key->id_pelamar;
		}


		if ($this->form_validation->run()==FALSE) 
		{
			$this->load->view('admin/nilai2/template/header');
			$this->load->view('admin/nilai2/update',$data);
			$this->load->view('admin/nilai2/template/footer');

		}
		else
		{
			
			$this->nilai_model2->UpdateById($id_nilai);
			$this->load->view('admin/nilai2/template/header');
			echo '<script type="text/javascript">alert("Data Berhasil di ubah!!")</script>';
			redirect('Nilai2/detail/'.$id_pelamar, 'refresh');

		}

	}

	public function delete($id_nilai)
	{
		$this->load->view('admin/nilai2/template/header');
		helper_log("delete", "menghapus data nilai");
		$this->nilai_model2->delete($id_nilai);
		echo '<script type="text/javascript">alert("Data Berhasil di hapus!!")</script>';
		redirect('Nilai2', 'refresh');

	}
	public function delete_alternatif($id_aletrnatif)
	{
		$this->load->view('admin/nilai2/template/header');
		$this->nilai_model2->deleteByAlternatif($id_aletrnatif);
		echo '<script type="text/javascript">alert("Data Berhasil di hapus!!")</script>';
		redirect('Nilai2', 'refresh');

	}


	

}

?>
