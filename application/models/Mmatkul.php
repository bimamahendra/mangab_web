<?php
class Mmatkul extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getAllMatkul(){
    return $this->db->get('matkul')->result();
  }

  public function getMatkul($kode){
    return $this->db->where('ID_MATKUL', $kode)->get('matkul')->row();
  }

  public function insert($data){
    $this->db->insert('matkul', $data);
    return TRUE;
  }

  public function update($kode, $data){
    $this->db->where('ID_MATKUL', $kode)->update('matkul', $data);
    return $this->db->affected_rows();
  }

  public function reset($kode){
  	$this->db->query("UPDATE matkul SET ID_DEVICE = NULL, STATUS_LOGIN = 0, STATUS_PASS = 0, LAST_LOGOUT = NULL WHERE NRP_MHS = ".$kode." ");
  	return $this->db->affected_rows();
  }

  public function delete($kode){
    $this->db->where('ID_MATKUL', $kode)->delete('matkul');
    return $this->db->affected_rows();
  }
}
?>