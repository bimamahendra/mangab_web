<?php
class Mdosen extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function getAllDosen(){
    return $this->db->get('dosen')->result();
  }

  public function getDosen($nip){
    return $this->db->where('NIP_DOSEN', $nip)->get('dosen')->row();
  }

  public function insert($data){
    $this->db->insert('dosen', $data);
    return TRUE;
  }

  public function update($nip, $data){
    $this->db->where('NIP_DOSEN', $nip)->update('dosen', $data);
    return $this->db->affected_rows();
  }

  public function reset($nip){
    $this->db->query("UPDATE dosen SET PASS_DOSEN = 'stikimalang', STATUS_PASS = 0 WHERE NIP_DOSEN = ".$nip." ");
    return $this->db->affected_rows();
  }

  public function delete($nip){
    $this->db->where('NIP_DOSEN', $nip)->delete('dosen');
    return $this->db->affected_rows();
  }
}
?>