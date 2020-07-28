<?php
 defined('BASEPATH') OR exit ('No direct script access allowed');

class nilai_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function insertNilaiBaru($data)
    {
        
        $this->db->insert('nilai',$data);
    }

    public function get_penilaian()
        {
            $query = $this->db->get('nilai');
            return $query->result();
        }

    public function getDataNilai()
    {

        $this->db->SELECT("nilai.nilai, pelamar.nama, kriteria.nama_kriteria, nilai.id_pelamar, nilai.id_kriteria,nilai.id_nilai");
        $this->db->FROM("nilai");
        $this->db->JOIN("pelamar","nilai.id_pelamar = pelamar.id_pelamar");
        $this->db->JOIN("kriteria", "nilai.id_kriteria = kriteria.id_kriteria");
        return $this->db->get()->result();
        
    }

    public function getDataNilaiDetail($id)
    {

        $this->db->SELECT("nilai.nilai, pelamar.nama, kriteria.nama_kriteria, nilai.id_pelamar, nilai.id_kriteria,nilai.id_nilai");
        $this->db->FROM("nilai");
        $this->db->where('nilai.id_pelamar',$id);
        $this->db->JOIN("pelamar","nilai.id_pelamar = pelamar.id_pelamar");
        $this->db->JOIN("kriteria", "nilai.id_kriteria = kriteria.id_kriteria");
        
        return $this->db->get()->result();
        
    }
    public function kriteriaByalternatif($pelamar){
        $this->db->SELECT("nilai.nilai, pelamar.nama, kriteria.nama_kriteria");
        $this->db->FROM("nilai");
        $this->db->JOIN("pelamar","nilai.id_pelamar = pelamar.id_pelamar");
        $this->db->JOIN("kriteria", "nilai.id_kriteria = kriteria.id_kriteria");
        $this->db->where("nilai2.id_pelamar",$pelamar);
        return $this->db->get()->result();
    }

    public function getNilaiByKriteria($id)
    {
        $this->db->where('id_kriteria',$id);
        $query = $this->db->get('nilai');
        return $query->result();
    }

    public function getNilai($id_nilai)
    {
    
        $this->db->where('id_nilai',$id_nilai);
        $query = $this->db->get('nilai');
        return $query->result();
    }

    public function UpdateById($id_nilai){
        
        $data = array(
            'nilai' =>$this->input->post('nilai')
        );

        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai', $data);
        if($this->db->affected_rows()==1)
            {
                return true;
            }
            else
            {
                return false;
            }
    }

    public function delete($id_nilai){
        $this->db->where('id_nilai', $id_nilai);
        $this->db->delete('nilai');
    }

    public function deleteByAlternatif($alternatif){
        $this->db->where('id_pelamar', $alternatif);
        $this->db->delete('nilai');
    }

    public function get_alternatif_from_nilai()
        {
            $query = $this->db->query("SELECT DISTINCT id_pelamar FROM nilai ;");
            return $query->result();
        }
        
}
?>