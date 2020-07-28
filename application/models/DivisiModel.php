<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DivisiModel extends CI_Model {
	public function get()
	{
		$this->db->select("divisi_magang.*");
		$this->db->order_by('nama_divisi','desc');
		return $this->db->get('divisi_magang')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id_divisi',$id)->get('divisi_magang')->row(0);
	}
	public function auto_code()
	{
		$last_id_sql = $this->db->query("select id from divisi order by id desc limit 1");
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
		$set = array(
			'nama_divisi' => $this->input->post('nama_divisi'),
			'gambar' => $this->input->post('gambar'),
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->insert('divisi_magang',$set);
	}
	public function update($id) {
		$set = array(
			'nama_divisi' => $this->input->post('nama_divisi'),
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->where('id_divisi',$id);
		$this->db->update('divisi_magang',$set);
	}	
	public function delete($id)
	{
		$this->db->where('id_divisi',$id);
		$delete = $this->db->delete('divisi_magang');
		if ($this->db->error()['code'] == 1451){
			$this->session->set_flashdata('error_message',"Gagal Menghapus Terdapat Foreign Key");
		}
	}

	public function getOne($id)
	{
		$query = $this->db->query("select * from divisi_magang where id_divisi='$id'");
		return $query->result_array();
	}
}
