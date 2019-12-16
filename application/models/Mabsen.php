<?php
class Mabsen extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getAllAbsen(){
    $query = $this->db->query("SELECT absen.ID_ABSEN, dosen.NAMA_DOSEN, matkul.NAMA_MATKUL, absen.TOPIK, absen.RUANGAN_ABSEN, absen.TS_ABSEN, absen.STATUS_ABSEN FROM dosen JOIN matkul ON dosen.NIP_DOSEN = matkul.NIP_DOSEN JOIN absen ON matkul.ID_MATKUL = absen.ID_MATKUL WHERE absen.STATUS_ABSEN = 1 OR absen.STATUS_ABSEN = 2 ORDER BY (ID_ABSEN) DESC");
    return $query->result();
  }

  public function verifAbsen($id){
    $this->db->query("UPDATE absen SET STATUS_ABSEN = 2 WHERE ID_ABSEN = ".$id." ");
    return $this->db->affected_rows();
  }

  public function getAbsen($id){
    $query = $this->db->query("SELECT absen.ID_ABSEN, mahasiswa.NRP_MHS, mahasiswa.NAMA_MHS, detail_absen.STATUS_DETABSEN, detail_absen.TS_DETABSEN FROM absen JOIN detail_absen ON absen.ID_ABSEN = detail_absen.ID_ABSEN JOIN mahasiswa ON detail_absen.NRP_MHS = mahasiswa.NRP_MHS WHERE detail_absen.ID_ABSEN = ".$id." ORDER BY (detail_absen.NRP_MHS) ASC");
    return $query->result();
  }

  public function getNote($id){
    $query = $this->db->query("SELECT NOTE FROM absen WHERE ID_ABSEN = ".$id."");
    return $query->result();
  }

  public function delete($id){
    $query = $this->db->query("DELETE FROM absen WHERE ID_ABSEN = ".$id." ");
    $query = $this->db->query("DELETE FROM detail_absen WHERE ID_ABSEN = ".$id." ");
    return $query->affected_rows();
  }

  public function stat(){
    $query = $this->db->query("SELECT SUM(STATUS_DETABSEN = 0) AS a, SUM(STATUS_DETABSEN = 1) AS m, SUM(STATUS_DETABSEN = 2) AS s, SUM(STATUS_DETABSEN = 3) AS i FROM detail_absen");
    return $query->result();
  }
}
?>