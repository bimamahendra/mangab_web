<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library("encryption");
        $this->load->database();
    }

    public function myLecture(){
        $response = [];

        $nip = $this->input->post('nip');
        
        $data = $this->db->query("SELECT KODE_MATKUL as kode, 
        NAMA_MATKUL as nama FROM matkul WHERE NIP_DOSEN='".$nip."' GROUP BY NAMA_MATKUL")->result();

        if(count($data) > 0){
            $response["error"] = false;
            $response["message"] = "Matkul ditemukan";
            $response["data"] = $data;
            $this->throw(200, $response);
            return;
        }

        $response["error"] = true;
        $response["message"] = "Anda tidak mengajar di mata kuliah manapun";
        $this->throw(200, $response);
    }

    public function myClass(){
        $response = array();

        $kode = $this->input->post("kode_matkul");

        $data = $this->db->query("SELECT ID_MATKUL as id_matkul, KELAS_MATKUL as kelas FROM matkul WHERE KODE_MATKUL='".$kode."'")->result();
        if(count($data) > 0){
            $response["error"] = false;
            $response["message"] = "Kelas ditemukan";
            $response["data"] = $data;

            $this->throw(200, $response);
            return;
        }

        $response["error"] = true;
        $response["message"] = "Mata kuliah ini tidak terdaftar di kelas manapun";
        $this->throw(200, $response);
    }

    public function generateQrCode(){
        $response = [];

        $idMatkul = $this->input->post("id_matkul");
        $topik = $this->input->post("topik");
        $ruangan = $this->input->post("ruangan");

        $data = array(
            "ID_MATKUL" => $idMatkul,
            "TOPIK" => $topik,
            "RUANGAN_ABSEN" => $ruangan,
            "DATE_ABSEN" => date("Y-m-d"),
            "TIME_ABSEN" => date("H:i"),
            "TS_ABSEN" => date("Y-m-d H:i:s"),
            "STATUS_ABSEN" => 0
        );

        $this->db->insert("absen", $data);
        if($this->db->affected_rows() > 0){
            $id = $this->db->insert_id();
            $insertedData = $this->db->where("ID_ABSEN", $id)->get("absen")->row();

            $detailAbsenMhs = array();
            $mhs = $this->db->query("SELECT a.NRP_MHS as nrp, 
                b.NAMA_MHS as nama, 
                b.EMAIL_MHS as email 
                FROM ambilmk a 
                JOIN mahasiswa b
                ON b.NRP_MHS = a.NRP_MHS 
                WHERE a.ID_MATKUL = '".$idMatkul."' ")->result_array();

            foreach($mhs as $row){
                $dataDetailAbsen["ID_ABSEN"] = $id;
                $dataDetailAbsen["NRP_MHS"] = $row["nrp"];
                $dataDetailAbsen["STATUS_DETABSEN"] = 0;
                $dataDetailAbsen["TS_DETABSEN"] = null;

                $detailAbsenMhs[] = $dataDetailAbsen;
            }

            if(count($detailAbsenMhs) == 0){
                $response["error"] = true;
                $response["message"] = "Tidak ada mahasiswa yang terdaftar di matkul ini";
                $this->throw(200, $response);
                return;
            }

            $this->db->insert_batch("detail_absen", $detailAbsenMhs);
            if($this->db->affected_rows() > 0){
                $mhs = $this->db->query("SELECT a.NRP_MHS as nrp, 
                    b.NAMA_MHS as nama, 
                    b.EMAIL_MHS as email,
                    a.STATUS_DETABSEN as status_absen 
                    FROM detail_absen a 
                    JOIN mahasiswa b
                    ON b.NRP_MHS = a.NRP_MHS 
                    WHERE a.ID_ABSEN = '".$id."' ")->result();

                $response["error"] = false;
                $response["message"] = "Berhasil generate QR Code";
                $response["id_absen"] = $id;
                $response["qr_code"] = $this->encryption->encrypt($insertedData->ID_ABSEN."||".$idMatkul);
                $response["data_mhs"] = $mhs;
    
                $this->throw(200, $response);
                return;
            }
        }
        
        $response["error"] = true;
        $response["message"] = "Gagal generate QR Code";

        $this->throw(200, $response);
    }

    private function throw($statusCode, $response){
        $this->output->set_status_header($statusCode)
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
}
