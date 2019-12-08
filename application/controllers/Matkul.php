<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mmatkul');
	}

	public function index(){
		$param['main_content'] = 'matkul/list';
		$param['page_title'] = 'Daftar Mata Kuliah';
		$param['matkul_list'] = $this->Mmatkul->getAllMatkul();
		$this->load->view('dashboard', $param);
	}

	public function add_matkul(){
		$param['main_content'] = 'matkul/add';
		$param['page_title'] = 'Tambahkan Mata Kuliah';
		$this->load->view('dashboard', $param);
	}

	public function create(){
		$kode 	= $this->input->post('kode');
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		if (empty($kode) || empty($nama) || empty($kelas)) {
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			redirect('Mahasiswa/add_mhs');
		} else {
			$data = [
				'KODE_MATKUL' => $kode, 
				'NAMA_MATKUL' => $nama,
				'KELAS' => $kelas,
			];
			$cek = $this->Mmatkul->insert($data);
			if($cek){
				$this->session->set_flashdata('success_message', 'Data mahasiswa berhasil ditambahkan');
				redirect('Matkul');
			}else{
				$this->session->set_flashdata('error_message', 'Terjadi kesalahan dalam menambahkan data!');
				redirect('Matkul/add_matkul');
			}

		}
	}

	public function edit_matkul($kode){
		$data['main_content'] = 'matkul/edit';
		$data['page_title'] = 'Edit Data Mata Kuliah';
		$data['matkul'] = $this->Mmatkul->getMatkul($kode);
		$this->load->view('dashboard', $data);
	}

	public function update(){
		$id 	= $this->input->post('id');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		if (empty($kode) || empty($nama) || empty($kelas)) {
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			redirect('Matkul/edit_matkul/'.$id);
		} else {
			$data = [
				'KODE_MATKUL' => $kode, 
				'NAMA_MATKUL' => $nama,
				'KELAS' => $kelas,
				];
				$this->Mmatkul->update($id, $data);
				$this->session->set_flashdata('success_message', 'Data mata kuliah berhasil diubah');
				redirect('Matkul');
		}
	}

	public function delete($kode){
		$this->Mmatkul->delete($kode);
		$this->session->set_flashdata('success_message', 'Data mata kuliah berhasil dihapus');
		redirect('Matkul');
	}
}