<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mdosen');
	}

	public function index(){
		$param['main_content'] = 'dosen/list';
		$param['page_title'] = 'Daftar Dosen';
		$param['dosen_list'] = $this->Mdosen->getAllDosen();
		$this->load->view('dashboard', $param);
	}

	public function add_dosen(){
		$param['main_content'] = 'dosen/add';
		$param['page_title'] = 'Tambahkan Dosen';
		$this->load->view('dashboard', $param);
	}

	public function create(){
		$nip 	= $this->input->post('nip');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		if (empty($nip) || empty($nama) || empty($email)) {
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			redirect('Dosen/add_dosen');
		} else {
			$data = [
				'NIP_DOSEN' => $nip, 
				'PASS_DOSEN' => "stikimalang",
				'NAMA_DOSEN' => $nama,
				'EMAIL_DOSEN' => $email,
				'STATUS_LOGIN' => '0',
				'STATUS_PASS' => '0',
			];
			$cek = $this->Mdosen->insert($data);
			if($cek){
				$this->session->set_flashdata('success_message', 'Data dosen berhasil ditambahkan');
				redirect('Dosen');
			}else{
				$this->session->set_flashdata('error_message', 'Terjadi kesalahan dalam menambahkan data!');
				redirect('Dosen/add_dosen');
			}

		}
	}

	public function edit_dosen($nip){
		$data['main_content'] = 'dosen/edit';
		$data['page_title'] = 'Edit Data Dosen';
		$data['dosen'] = $this->Mdosen->getDosen($nip);
		$this->load->view('dashboard', $data);
	}

	public function update(){
		$nip 	= $this->input->post('nip');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$reset = $this->input->post('reset');
		if (empty($nip) || empty($nama) || empty($email)) {
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			redirect('Dosen/edit_dosen/'.$nrp);
		} else {
			$data = [
				'NIP_DOSEN' => $nip, 
				'NAMA_DOSEN' => $nama,
				'EMAIL_DOSEN' => $email,
				];
				$this->Mdosen->update($nip, $data);
				if($reset == "on"){
					$this->Mdosen->reset($nip);
				}

				$this->session->set_flashdata('success_message', 'Data dosen berhasil diubah');
				redirect('Dosen');
		}
	}

	public function delete($nip){
		$this->Mdosen->delete($nip);
		$this->session->set_flashdata('success_message', 'Data dosen berhasil dihapus');
		redirect('Dosen');
	}
}