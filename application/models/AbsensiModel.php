<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AbsensiModel extends CI_Model {
	public function get()
	{
		$this->db->select("absensi.*,(select nama from siswa_magang where id_siswa=absensi.fk_id_siswa) as nama_siswa");
		$this->db->order_by('tanggal','desc');
		$this->db->join('siswa_magang','absensi.fk_id_siswa=siswa_magang.id_siswa','left');
		if($this->session->userdata('logged_in_pendamping')){
			$this->db->where('fk_id_pendamping',$this->session->userdata('logged_in_pendamping')['id_pendamping']);
		}
		return $this->db->get('absensi')->result();
	}
	public function get_report_siswa($id_siswa)
	{
		$this->db->select("absensi.*,(select nama from siswa_magang where id_siswa=absensi.fk_id_siswa) as nama_siswa");
		$this->db->order_by('tanggal','desc');
		$this->db->where('fk_id_siswa',$id_siswa);
		return $this->db->get('absensi')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id_absensi',$id)->get('absensi')->row(0);
	}
	public function auto_code()
	{
		$last_id_sql = $this->db->query("select id from absensi order by id desc limit 1");
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
			'tanggal' => $this->input->post('tanggal'),
			'datang' => $this->input->post('datang'),
			'pulang' => $this->input->post('pulang'),
			'aktivitas' => $this->input->post('aktivitas'),
			'keterangan' => $this->input->post('keterangan'),
			'fk_id_siswa' => $this->input->post('fk_id_siswa'),
		);
		$this->db->insert('absensi',$set);
	}
	public function update($id)
	{
		$set = array(
			'tanggal' => $this->input->post('tanggal'),
			'datang' => $this->input->post('datang'),
			'pulang' => $this->input->post('pulang'),
			'aktivitas' => $this->input->post('aktivitas'),
			'keterangan' => $this->input->post('keterangan'),
			'fk_id_siswa' => $this->input->post('fk_id_siswa'),
		);
		$this->db->where('id_absensi',$id);
		$this->db->update('absensi',$set);
	}
	public function delete($id)
	{
		$this->db->where('id_absensi',$id);
		$delete = $this->db->delete('absensi');
		if ($this->db->error()['code'] == 1451){
			$this->session->set_flashdata('error_message',"Gagal Menghapus Terdapat Foreign Key");
		}
	}
}
