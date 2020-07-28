<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PendampingModel extends CI_Model {

	public function get()
	{
		$this->db->select("pendamping_magang.*");
		$this->db->order_by('id_pendamping','desc');
		return $this->db->get('pendamping_magang')->result();
	}
	
	public function get_id($id)
	{
		return $this->db->where('id_pendamping',$id)->get('pendamping_magang')->row(0);
	}

	public function auto_code()
	{
		$last_id_sql = $this->db->query("select id from pendamping_magang order by id desc limit 1");
		if($last_id_sql->num_rows() == 0){
			$last_id = 0;
		}else{
			$last_id = $last_id_sql->row(0)->id;
		}
		$new_id = substr("0000".$last_id+1, -4);
		return "LK".$new_id;
	}

	public function insert()
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$this->db->insert('pendamping_magang',$set);
	}

	public function update($id)
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$this->db->where('id_pendamping',$id);
		$this->db->update('pendamping_magang',$set);
	}

	public function delete($id)
	{
		$this->db->where('id_pendamping',$id);
		$delete = $this->db->delete('pendamping_magang');
		if ($this->db->error()['code'] == 1451){
			$this->session->set_flashdata('error_message',"Gagal Menghapus Terdapat Foreign Key");
		}
	}
}
