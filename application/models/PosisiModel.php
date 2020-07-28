<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PosisiModel extends CI_Model {
	public function get()
	{
		$this->db->select("posisi_kerja.*");
		$this->db->order_by('nama_posisi','desc');
		return $this->db->get('posisi_kerja')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id_posisi',$id)->get('posisi_kerja')->row(0);
	}
	public function auto_code()
	{
		$last_id_sql = $this->db->query("select id from posisi_kerja order by id desc limit 1");
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
			'nama_posisi' => $this->input->post('nama_posisi'),
			'fk_id_divisi' => $this->input->post('fk_id_divisi'),
			'gambar' => $this->input->post('gambar'),
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->insert('posisi_kerja',$set);
	}
	public function update($id)
	{
		$set = array(
			'nama_posisi' => $this->input->post('nama_posisi'),
			'fk_id_divisi' => $this->input->post('fk_id_divisi'),
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->where('id_posisi',$id);
		$this->db->update('posisi_kerja',$set);
	}
	public function delete($id)
	{
		$this->db->where('id_posisi',$id);
		$delete = $this->db->delete('posisi_kerja');
		if ($this->db->error()['code'] == 1451){
			$this->session->set_flashdata('error_message',"Gagal Menghapus Terdapat Foreign Key");
		}
	}
}
