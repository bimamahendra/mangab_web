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

        $isNotExists = $this->db
        ->where("NRP_MHS", $nrp)
        ->where("ID_ABSEN", $idAbsen)
        ->get("detail_absen")
        ->row() == null;

        if($isNotExists){
            $response["error"] = true;
            $response["message"] = "Mahasiswa tidak terdaftar pada mata kuliah";
            
            $this->throw(200, $response);
            return;
        }

        $isNotExists = $this->db
        ->where("ID_ABSEN", $idAbsen)
        ->get("detail_absen")
        ->row() == null;

        if($isNotExists){
            $response["error"] = true;
            $response["message"] = "Absensi tidak ditemukan";
            
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
            $response["message"] = "Absensi berhasil";
            $this->throw(200, $response);
            return;
        }

        $response["error"] = true;
        $response["message"] = "Terjadi kesalahan";

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
            $response["message"] = "Detail absen ditemukan";
            $response["data"] = $data;
            
            $this->throw(200, $response);
            return;
        }

        $response["error"] = true;
        $response["message"] = "Detail absen tidak ditemukan";
        $this->throw(200, $response);
    }

    public function historyAbsensi(){
        $response = [];

        $noInduk = $this->input->post("no_induk");

        $isDosen = $this->db->where("NIP_DOSEN", $noInduk)->get("matkul")->row() != null;
        if($isDosen){
            $data = $this->db->query("SELECT a.KODE_MATKUL as kode_matkul,
            a.NAMA_MATKUL as nama_matkul,
            a.KELAS_MATKUL as kelas_matkul,
            b.TOPIK as topik_matkul,
            b.RUANGAN_ABSEN as ruangan_matkul,
            b.TS_ABSEN as jadwal_kelas
            FROM matkul a
            JOIN absen b
            ON a.ID_MATKUL = b.ID_MATKUL
            WHERE a.NIP_DOSEN = '".$noInduk."'
            ")->result();

            if(count($data) > 0){    
                $response["error"] = false;
                $response["message"] = "Riwayat ditemukan";
                $response["data"] = $data;

                $this->throw(200, $response);
                return;
            }

            $response["error"] = true;
            $response["message"] = "Riwayat absen ditemukan";

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
            ON a.ID_ABSEn = b.ID_ABSEN
            AND b.ID_MATKUL = c.ID_MATKUL
            WHERE a.NRP_MHS = '".$noInduk."'
            ")->result();

            if(count($data) > 0){    
                $response["error"] = false;
                $response["message"] = "Riwayat ditemukan";
                $response["data"] = $data;

                $this->throw(200, $response);
                return;
            }

            $response["error"] = true;
            $response["message"] = "Riwayat absen ditemukan";

            $this->throw(200, $response);

            return;
        }

        $response["error"] = true;
        $response["message"] = "Riwayat absen tidak ditemukan";
        $this->throw(200, $response);
    }

    private function throw($statusCode, $response){
        $this->output->set_status_header($statusCode)
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
}
