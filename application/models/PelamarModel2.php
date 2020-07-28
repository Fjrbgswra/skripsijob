<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PelamarModel2 extends CI_Model {
	public function get()
	{
		return $this->db->get('pelamar')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id_pelamar',$id)->get('pelamar')->row(0);
	}
	public function auto_code()
	{
		$last_id_sql = $this->db->query("select id from pelamar order by id desc limit 1");
		if($last_id_sql->num_rows() == 0){
			$last_id = 0;
		}else{
			$last_id = $last_id_sql->row(0)->id;
		}
		$new_id = substr("0000".$last_id+1, -4);
		return "LK".$new_id;
	}
	public function insert($data)
	{
		return $this->db->insert('pelamar', $data);
	}

	public function GetLastData(){
		$this->db->order_by("id_pelamar","DESC");
		$query = $this->db->get('pelamar');
		return $query->row();
	}

	public function insertAlternatifBaru($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama',"Nama","required");
		if ($this->form_validation->run() == false) {
			$this->load->view('user/register');
		}else{
			$set = array(
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
				'fk_posisi_magang' => $id,
			);

			$this->db->insert('pelamar',$set);
			redirect('Home');
		}
	}

	public function update($id) {
		$set = array(
			'nim_nisn' => $this->input->post('nim_nisn'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'jurusan' => $this->input->post('jurusan'),
			'nama_instansi' => $this->input->post('nama_instansi'),
			'semester' => $this->input->post('semester'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'foto' => $upload_data['file_name'],
			'fk_posisi_magang' => $this->input->post('fk_posisi_magang'),
		);
		$this->db->where('id_pelamar',$id);
		$this->db->update('pelamar',$set);
	}
	public function delete($id)
	{
		$this->db->where('id_pelamar',$id);
		$this->db->delete('pelamar');
	}
	public function login($username, $password){
       // Validasi
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('pelamar');
		if($result->num_rows() == 1){
			$data['id_pelamar'] = $result->row(0)->id_pelamar;
			$data['fk_id_level'] = $result->row(0)->fk_id_level;
			return $data;
		} else {
			return false;
		}
	}

	public function getDataAlternatifByUser2($id)
	{
		$this->db->select('pelamar.id_pelamar,nama');
		$this->db->where('id_pelamar',$id);
		$this->db->order_by("id_pelamar","asc");
		$query = $this->db->get('pelamar');
		return $query->result();
	}

	public function getDataAlternatifByUser()
	{
		$this->db->select('pelamar.id_pelamar,nama');
		$this->db->order_by("id_pelamar","asc");
		$query = $this->db->get('pelamar');
		return $query->result();
	}

	public function getDataAlternatif()
	{
		$this->db->select('pelamar.id_pelamar,nama');
		$this->db->order_by("id_pelamar","asc");
		$query = $this->db->get('pelamar');
		return $query->result();
	}
}
