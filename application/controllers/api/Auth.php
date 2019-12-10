<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function checkStatusLogin(){
        $response = [];
        $idDevice = $this->input->post("id_device");
        
        $data = $this->db->where("ID_DEVICE", $idDevice)->get("mahasiswa")->row();
        if($data != null){
            if($data->STATUS_LOGIN == 1){ 
                $response["error"] = false;
                $response["message"] = "Selamat datang kembali";
                $response["type"] = "mahasiswa";
                $response["no_induk"] = $data->NRP_MHS;
                $response["nama"] = $data->NAMA_MHS;
                $response["email"] = $data->EMAIL_MHS;
                $this->throw(200, $response);
                return;
            }
        }

        $response["error"] = true;
        $response["message"] = "Silahkan login terlebih dahulu";
        $this->throw(200, $response);
    }

    public function login()
    {
        $response = [];

        $nrp = $this->input->post("no_induk");
        $password = $this->input->post("password");

        $isDosenExists = $this->db->where("NIP_DOSEN", $nrp)->get("dosen")->row() != null;
        $isMhsExists = $this->db->where("NRP_MHS", $nrp)->get("mahasiswa")->row() != null;

        if(!$isDosenExists && !$isMhsExists){
            $response["error"] = true;
            $response["message"] = "Akun tidak terdaftar";
            $this->throw(200, $response);
            return;
        }

        $data = $this->db->where("NIP_DOSEN", $nrp)->where("PASS_DOSEN", $password)->get("dosen")->row();

        if($data != null){
            if($data->STATUS_LOGIN == 1){
                $response["error"] = true;
                $response["message"] = "Akun sedang login di perangkat lain";
                $this->throw(200, $response);
                return;
            }

            $update = $this->db->query("UPDATE dosen SET STATUS_LOGIN = 1 WHERE NIP_DOSEN = ".$nrp." ");
            if($this->db->affected_rows() > 0){
                $response["error"] = false;
                $response["message"] = "Login sukses";
                $response["type"] = "dosen";
                $response["no_induk"] = $data->NIP_DOSEN;
                $response["nama"] = $data->NAMA_DOSEN;
                $response["email"] = $data->EMAIL_DOSEN;
                $response["status_password"] = $data->STATUS_PASS;
                $this->throw(200, $response);
                return;
            }else {
                $response["error"] = false;
                $response["message"] = "Terjadi kesalahan";
                $this->throw(200, $response);
                return;
            }
        }

        $data = $this->db->where("NRP_MHS", $nrp)->where("PASS_MHS", $password)->get("mahasiswa")->row();
        if($data != null){
            if($data->STATUS_LOGIN == 1){
                $response["error"] = true;
                $response["message"] = "Akun sedang login di perangkat lain";
                $this->throw(200, $response);
                return;
            }

            $currentTime = round(microtime(true) * 1000);
            $isUnderLogoutPenalty = ($currentTime - $data->LAST_LOGOUT) < 15 * 60 * 1000;

            if($isUnderLogoutPenalty){
                $response["error"] = true;
                $response["message"] = "Anda sedang dalam masa hukuman logout, makanya jangan logout bambank";
                $this->throw(200, $response);
                return;
            }

            $update = $this->db->query("UPDATE mahasiswa SET STATUS_LOGIN = 1 WHERE NRP_MHS = ".$nrp." ");
            if($this->db->affected_rows() > 0){
                $response["error"] = false;
                $response["message"] = "Login sukses";
                $response["type"] = "mahasiswa";
                $response["no_induk"] = $data->NRP_MHS;
                $response["nama"] = $data->NAMA_MHS;
                $response["email"] = $data->EMAIL_MHS;
                $response["status_password"] = $data->STATUS_PASS;
                $this->throw(200, $response);
                return;
            }else {
                $response["error"] = false;
                $response["message"] = "Terjadi kesalahan";
                $this->throw(200, $response);
                return;
            }
        }

        $response["error"] = true;
        $response["message"] = "Password salah";
        $this->throw(200, $response);
    }

    public function logout(){
        $response = [];
        $nrp = $this->input->post("no_induk");

        $data = $this->db->where("NRP_MHS", $nrp)->get("mahasiswa")->row();
        if($data != null){
            $update = $this->db->query("UPDATE mahasiswa SET ID_DEVICE = NULL, 
            STATUS_LOGIN = 0, LAST_LOGOUT = ".round(microtime(true) * 1000)." WHERE NRP_MHS = ".$nrp." ");
            if($this->db->affected_rows() > 0){
                $response["error"] = false;
                $response["message"] = "Berhasil logout";
                $this->throw(200, $response);
                return;
            }else {
                $response["error"] = false;
                $response["message"] = "Terjadi kesalahan";
                $this->throw(200, $response);
                return;
            }
        }

        $data = $this->db->where("NIP_DOSEN", $nrp)->get("dosen")->row();
        if($data != null){
            $update = $this->db->query("UPDATE dosen SET STATUS_LOGIN = 0 WHERE NIP_DOSEN = ".$nrp." ");
            
            if($this->db->affected_rows() > 0){
                $response["error"] = false;
                $response["message"] = "Berhasil logout";
                $this->throw(200, $response);
                return;
            }else {
                $response["error"] = false;
                $response["message"] = "Terjadi kesalahan";
                $this->throw(200, $response);
                return;
            }
        }

        $response["error"] = true;
        $response["message"] = "Akun tidak terdaftar";
        $this->throw(200, $response);
    }

    public function changePassword(){
        $response = [];

        $noInduk = $this->input->post("no_induk");
        $newPassword = $this->input->post("new_password");

        $data = $this->db->where("NRP_MHS", $noInduk)->get("mahasiswa")->row();
        if($data != null){
            $update = $this->db->query("UPDATE mahasiswa SET PASS_MHS='".$newPassword."', STATUS_PASS = 1
            WHERE NRP_MHS =".$noInduk."");
            if($this->db->affected_rows() > 0){
                $response["error"] = false;
                $response["message"] = "Berhasil ubah password";
                $this->throw(200, $response);
                return;
            }else {
                $response["error"] = false;
                $response["message"] = "Terjadi kesalahan";
                $this->throw(200, $response);
                return;
            }
        }

        $data = $this->db->where("NIP_DOSEN", $noInduk)->get("dosen")->row();
        if($data != null){
            $update = $this->db->query("UPDATE dosen SET PASS_DOSEN ='".$newPassword."', STATUS_PASS = 1
            WHERE NIP_DOSEN =".$noInduk."");
            if($this->db->affected_rows() > 0){
                $response["error"] = false;
                $response["message"] = "Berhasil ubah password";
                $this->throw(200, $response);
                return;
            }else {
                $response["error"] = false;
                $response["message"] = "Terjadi kesalahan";
                $this->throw(200, $response);
                return;
            }
        }

        $response["error"] = true;
        $response["message"] = "Akun tidak terdaftar";
        $this->throw(200, $response);
    }

    private function throw($statusCode, $response){
        $this->output->set_status_header($statusCode)
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
}
