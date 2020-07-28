<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DofModel extends CI_Model {
	public function get_tanggal()
	{
		$this->db->select("tanggal.*");
		$this->db->order_by('id_tangal','desc');
		return $this->db->get('tanggal')->result();
	}

  public function get_id_tanggal($id)
  {
    return $this->db->where('id_tanggal',$id)->get('tanggal')->row(0);
  }

  public function get_bulan()
  {
    $this->db->select("bulan.*");
    $this->db->order_by('id_bulan','desc');
    return $this->db->get('bulan')->result();
  }

  public function get_id_bulan($id)
  {
    return $this->db->where('id_bulan',$id)->get('bulan')->row(0);
  }

  public function get_tahun()
  {
    $this->db->select("tahun.*");
    $this->db->order_by('id_tahun','desc');
    return $this->db->get('tahun')->result();
  }

  public function get_id_tahun($id)
	{
		return $this->db->where('id_tahun',$id)->get('tahun')->row(0);
	}
}
