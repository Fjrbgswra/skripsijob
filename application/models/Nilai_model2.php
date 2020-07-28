<?php
 defined('BASEPATH') OR exit ('No direct script access allowed');

class nilai_model2 extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function insertNilaiBaru($data)
    {
        
        $this->db->insert('nilai2',$data);
    }

    public function get_penilaian()
        {
            $query = $this->db->get('nilai2');
            return $query->result();
        }

    public function getDataNilai()
    {

        $this->db->SELECT("nilai2.nilai, pelamar.nama, kriteria2.nama_kriteria, nilai2.id_pelamar, nilai2.id_kriteria,nilai2.id_nilai");
        $this->db->FROM("nilai2");
        $this->db->JOIN("pelamar","nilai2.id_pelamar = pelamar.id_pelamar");
        $this->db->JOIN("kriteria2", "nilai2.id_kriteria = kriteria2.id_kriteria");
        return $this->db->get()->result();
        
    }

    public function getDataNilaiDetail($id)
    {

        $this->db->SELECT("nilai2.nilai, pelamar.nama, kriteria2.nama_kriteria, nilai2.id_pelamar, nilai2.id_kriteria,nilai2.id_nilai");
        $this->db->FROM("nilai2");
        $this->db->where('nilai2.id_pelamar',$id);
        $this->db->JOIN("pelamar","nilai2.id_pelamar = pelamar.id_pelamar");
        $this->db->JOIN("kriteria2", "nilai2.id_kriteria = kriteria2.id_kriteria");
        
        return $this->db->get()->result();
        
    }
    public function kriteriaByalternatif($pelamar){
        $this->db->SELECT("nilai2.nilai, pelamar.nama, kriteria2.nama_kriteria");
        $this->db->FROM("nilai2");
        $this->db->JOIN("pelamar","nilai2.id_pelamar = pelamar.id_pelamar");
        $this->db->JOIN("kriteria2", "nilai2.id_kriteria = kriteria2.id_kriteria");
        $this->db->where("nilai2.id_pelamar",$pelamar);
        return $this->db->get()->result();
    }

    public function getNilaiByKriteria($id)
    {
        $this->db->where('id_kriteria',$id);
        $query = $this->db->get('nilai2');
        return $query->result();
    }

    public function getNilai($id_nilai)
    {
    
        $this->db->where('id_nilai',$id_nilai);
        $query = $this->db->get('nilai2');
        return $query->result();
    }

    public function UpdateById($id_nilai){
        
        $data = array(
            'nilai' =>$this->input->post('nilai')
        );

        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai2', $data);
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
        $this->db->delete('nilai2');
    }

    public function deleteByAlternatif($alternatif){
        $this->db->where('id_pelamar', $alternatif);
        $this->db->delete('nilai2');
    }

    public function get_alternatif_from_nilai()
        {
            $query = $this->db->query("SELECT DISTINCT id_pelamar FROM nilai2 ;");
            return $query->result();
        }
        
}
?>