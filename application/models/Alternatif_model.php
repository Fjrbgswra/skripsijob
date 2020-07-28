<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Alternatif_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	
	public function insertAlternatifBaru($id)
	{
		$object = array(
			'id_pelamar' => $id,
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
		$this->db->insert('pelamar',$object);
	}

	public function GetLastData(){
		$this->db->order_by("id_pelamar","DESC");
		$query = $this->db->get('pelamar');
		return $query->row();
	}

	public function getDataAlternatif()
	{
		$this->db->select('alternatif.id_alternatif,nama_alternatif');
		// $this->db->join('user','user.id = alternatif.id_user');
		$this->db->order_by("id_alternatif","asc");
		$query = $this->db->get('alternatif');
		return $query->result();
	}

	public function getDataAlternatifByUser()
	{
		$this->db->select('alternatif.id_alternatif,nama_alternatif');
		// $this->db->join('user','user.id = alternatif.id_user');
		$this->db->order_by("id_alternatif","asc");
		$query = $this->db->get('alternatif');
		return $query->result();
	}
	public function getDataAlternatifPrint($id = null){
		$this->db->select('alternatif.id_alternatif,alternatif.nama_alternatif,nilai.nilai,kriteria.nama_kriteria');
		$this->db->join('nilai','nilai.id_alternatif = alternatif.id_alternatif');
		$this->db->join('kriteria','kriteria.id_kriteria = nilai.id_kriteria');
		if($id !== null){
			$this->db->where('alternatif.id_alternatif',$id);
		}
		$this->db->order_by("id_alternatif","asc");
		return $this->db->get('alternatif')->result();
	}
	public function getAlternatif($id_alternatif)
	{
		$this->db->where('id_alternatif',$id_alternatif);
		$query = $this->db->get('alternatif');
		return $query->result();
	}
	public function UpdateById($id_alternatif){
		$data = array(
			'nama_alternatif' =>$this->input->post('nama_alternatif')
			);
		$this->db->where('id_alternatif', $id_alternatif);
		$this->db->update('alternatif', $data);
		if($this->db->affected_rows()==1)
			{
				return true;
			}
			else
			{
				return false;
			}
	}
	public function delete($id_alternatif){
		$this->db->where('id_alternatif', $id_alternatif);
		$this->db->delete('alternatif');
	}
	public function get_alternatif()
        {
            $query = $this->db->get('alternatif');
            return $query->result();
        }
}
?>
