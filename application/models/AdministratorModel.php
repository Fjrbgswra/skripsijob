<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdministratorModel extends CI_Model {
	public function get()
	{
		$this->db->select("administrator.*");
		$this->db->order_by('id_administrator','desc');
		return $this->db->get('administrator')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id_administrator',$id)->get('administrator')->row(0);
	}
	public function auto_code()
	{
		$last_id_sql = $this->db->query("select id from administrator order by id desc limit 1");
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
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'fk_id_level' => $this->input->post('fk_id_level'),
		);
		$this->db->insert('administrator',$set);
	}
	public function update($id)
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$this->db->where('id_administrator',$id);
		$this->db->update('administrator',$set);
	}
	public function delete($id)
	{
		$this->db->where('id_administrator',$id);
		$this->db->delete('administrator');
	}
}
