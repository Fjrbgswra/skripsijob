<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LocationModel extends CI_Model {
	public function get_provinsi()
	{
		$this->db->select("provinsi.*");
		$this->db->order_by('id_provinsi','desc');
		return $this->db->get('provinsi')->result();
	}
	public function get_id($id)
	{
		return $this->db->where('id_provinsi',$id)->get('provinsi')->row(0);
	}
  public function get_kota()
  {
    $this->db->select("kota.*");
    $this->db->order_by('id_kota','desc');
    return $this->db->get('kota')->result();
  }
}
