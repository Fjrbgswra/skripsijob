<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class KomentarModel extends CI_Model {
	public function get()
	{
		$this->db->select("komentar.*");
		$this->db->order_by('id_komentar','desc');
		return $this->db->get('komentar')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id_komentar',$id)->get('komentar')->row(0);
	}
	public function auto_code()
	{
		$last_id_sql = $this->db->query("select id from komentar order by id desc limit 1");
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
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->insert('komentar',$set);
	}
	public function update($id)
	{
		$set = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->where('id_komentar',$id);
		$this->db->update('komentar',$set);
	}
	public function delete($id)
	{
		$this->db->where('id_komentar',$id);
		$delete = $this->db->delete('komentar');
		if ($this->db->error()['code'] == 1451){
			$this->session->set_flashdata('error_message',"Gagal Menghapus Terdapat Foreign Key");
		}
	}
}
