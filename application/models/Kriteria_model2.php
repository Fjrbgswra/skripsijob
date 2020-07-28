<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Kriteria_model2 extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	
	public function insertKriteriaBaru()
	{
		$object = array(
			'nama_kriteria' =>$this->input->post('nama_kriteria'),
			'tipe' =>$this->input->post('tipe'),
			'bobot' =>$this->input->post('bobot')
		);
		
		$this->db->insert('kriteria2',$object);

		return $this->db->insert_id();
	}
	public function getDataKriteria()
	{
		$this->db->order_by("id_kriteria","asc");
		$query=$this->db->get('kriteria2');
		return $query->result();
	}
	public function getKriteria($id_kriteria)
	{
		$this->db->where('id_kriteria',$id_kriteria);
		$query = $this->db->get('kriteria2');
		return $query->result();
	}
	public function UpdateById($id_kriteria){
		$data = array(
			'nama_kriteria' =>$this->input->post('nama_kriteria'),
			'tipe' =>$this->input->post('tipe'),
			'bobot' =>$this->input->post('bobot'));
		$this->db->where('id_kriteria', $id_kriteria);
		$this->db->update('kriteria2', $data);
		if($this->db->affected_rows()==1)
			{
				return true;
			}
			else
			{
				return false;
			}
	}
	public function delete($id_kriteria){
		$this->db->where('id_kriteria', $id_kriteria);
		$this->db->delete('kriteria2');
	}
}
?>
