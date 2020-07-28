<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class NamaInstansiModel extends CI_Model {
	public function get()
	{
		$this->db->select("nama_instansi.*");
		$this->db->order_by('id_instansi','desc');
		return $this->db->get('nama_instansi')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id_instansi',$id)->get('nama_instansi')->row(0);
	}
	public function auto_code()
	{
		$last_id_sql = $this->db->query("select id from nama_instansi order by id desc limit 1");
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
		  return $this->db->insert('nama_instansi', $data);
	}
	public function update($id) {
		$set = array(
			'nama_instansi' => $this->input->post('nama_instansi'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'fk_id_siswa' => $this->input->post('fk_id_siswa'),
		);
		$this->db->where('id_instansi',$id);
		$this->db->update('nama_instansi',$set);
  }	
	public function delete($id)
	{
		$this->db->where('id_instansi',$id);
		$delete = $this->db->delete('nama_instansi');
		if ($this->db->error()['code'] == 1451){
			$this->session->set_flashdata('error_message',"Gagal Menghapus Terdapat Foreign Key");
		}
	}
}
