<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library("encryption");
        $this->load->database();
    }

    public function absenMhs(){
        $response = [];

        $qrCode = $this->input->post("qr_code");
        $nrp = $this->input->post("nrp");
        $statusAbsen = $this->input->post("status_absen");

        $idAbsen = explode("||", $this->encryption->decrypt($qrCode))[0];
        $idMatkul = explode("||", $this->encryption->decrypt($qrCode))[1];

        $data = $this->db
        ->where("NRP_MHS", $nrp)
        ->where("ID_ABSEN", $idAbsen)
        ->get("detail_absen")
        ->row();

        if($data == null){
            $response["error"] = true;
            $response["message"] = "Student is not recognize in subject";
            
            $this->throw(200, $response);
            return;
        }

        $data = $this->db
        ->where("ID_ABSEN", $idAbsen)
        ->get("detail_absen")
        ->row();

        if($data == null){
            $response["error"] = true;
            $response["message"] = "Attendance is not found";
            
            $this->throw(200, $response);
            return;
        }

        $data = $this->db
        ->where("ID_ABSEN", $idAbsen)
        ->where("NRP_MHS", $nrp)
        ->get("detail_absen")
        ->row();

        if($data->STATUS_DETABSEN == 1){
            $response["error"] = true;
            $response["message"] = "Attended";
            
            $this->throw(200, $response);
            return;
        }

        $currentTimeStamp = date("Y-m-d H:i:s");
        $this->db->query("UPDATE detail_absen 
        SET STATUS_DETABSEN =".$statusAbsen.", 
        TS_DETABSEN = '".$currentTimeStamp."' 
        WHERE ID_ABSEN = ".$idAbsen." 
        AND NRP_MHS = '".$nrp."'");

        if($this->db->affected_rows() > 0){
            $response["error"] = false;
            $response["message"] = "Attended";
            $this->throw(200, $response);
            return;
        }

        $response["error"] = true;
        $response["message"] = "Error found";

        $this->throw(200, $response);
    }

    public function detailAbsen(){
        $response = [];

        $id = $this->input->post("id_absen");

        $data = $this->db->query("SELECT a.NRP_MHS as nrp, 
            b.NAMA_MHS as nama, 
            b.EMAIL_MHS as email,
            a.STATUS_DETABSEN as status_absen 
            FROM detail_absen a 
            JOIN mahasiswa b
            ON b.NRP_MHS = a.NRP_MHS 
            WHERE a.ID_ABSEN = '".$id."' ")->result();

        if(count($data) > 0){
            $response["error"] = false;
            $response["message"] = "Attendance detail found";
            $response["data"] = $data;
            
            $this->throw(200, $response);
            return;
        }

        $response["error"] = true;
        $response["message"] = "Attendance detail is not found";
        $this->throw(200, $response);
    }

    public function historyAbsensi(){
        $response = [];

        $noInduk = $this->input->post("no_induk");

        $isDosen = $this->db->where("NIP_DOSEN", $noInduk)->get("matkul")->row() != null;
        if($isDosen){
            $data = $this->db->query("SELECT b.KODE_MATKUL as kode_matkul,
            b.NAMA_MATKUL as nama_matkul,
            b.KELAS_MATKUL as kelas_matkul,
            a.TOPIK as topik_matkul,
            a.RUANGAN_ABSEN as ruangan_matkul,
            a.TS_ABSEN as jadwal_kelas
            FROM absen a
            JOIN matkul b
            ON b.ID_MATKUL = a.ID_MATKUL
            WHERE b.NIP_DOSEN = '".$noInduk."'
            AND a.STATUS_ABSEN = 1
            ")->result();

            if(count($data) > 0){    
                $response["error"] = false;
                $response["message"] = "History found";
                $response["data"] = $data;

                $this->throw(200, $response);
                return;
            }

            $response["error"] = true;
            $response["message"] = "History is not found";

            $this->throw(200, $response);
            return;
        }

        $isMhs = $this->db->where("NRP_MHS", $noInduk)->get("ambilmk")->row() != null;

        if($isMhs){
            $data = $this->db->query("SELECT c.KODE_MATKUL as kode_matkul,
            c.NAMA_MATKUL as nama_matkul,
            c.KELAS_MATKUL as kelas_matkul,
            b.TOPIK as topik_matkul,
            b.RUANGAN_ABSEN as ruangan_matkul,
            b.TS_ABSEN as jadwal_kelas,
            a.STATUS_DETABSEN as status_absen,
            a.TS_DETABSEN as jadwal_absen
            FROM detail_absen a 
            JOIN absen b
            JOIN matkul c
            ON a.ID_ABSEN = b.ID_ABSEN
            AND b.ID_MATKUL = c.ID_MATKUL
            WHERE a.NRP_MHS = '".$noInduk."'
            AND b.STATUS_ABSEN = 1
            ")->result();

            if(count($data) > 0){    
                $response["error"] = false;
                $response["message"] = "History found";
                $response["data"] = $data;

                $this->throw(200, $response);
                return;
            }

            $response["error"] = true;
            $response["message"] = "History is not found";

            $this->throw(200, $response);

            return;
        }

        $response["error"] = true;
        $response["message"] = "History is not found";
        $this->throw(200, $response);
    }

    public function rekap(){
        $response = [];

        $qrCode = $this->input->post("qr_code");
        $decrypted = $this->encryption->decrypt($qrCode);

        if($decrypted != false){
            $idAbsen = explode("||", $decrypted)[0];
            $data = $this->db->where("ID_ABSEN", $idAbsen)->get("absen")->row();

            if($data != null){
                if($data->STATUS_ABSEN == 1){
                    $response["error"] = true;
                    $response["message"] = "Attendance has been send";
                    $this->throw(200, $response);
                    return;
                }

                $this->db->query("UPDATE absen SET STATUS_ABSEN = 1 WHERE ID_ABSEN=".$idAbsen);
                if($this->db->affected_rows() > 0){
                    $response["error"] = false;
                    $response["message"] = "Send Attendance successfully";
                    $this->throw(200, $response);
                    return;
                }

                $response["error"] = true;
                $response["message"] = "Error found";
                $this->throw(200, $response);
                return;
            }

            $response["error"] = true;
            $response["message"] = "Attendance is not found";
            $this->throw(200, $response);
            return;
        }

        $response["error"] = true;
        $response["message"] = "QR Code format is not valid";
         $this->throw(200, $response);
    }

    private function throw($statusCode, $response){
        $this->output->set_status_header($statusCode)
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
}
