<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mabsen');
	}

	public function index(){
		$param['main_content'] = 'absen/list';
		$param['page_title'] = 'Daftar Absensi';
		$param['absen_list'] = $this->Mabsen->getAllAbsen();
		$this->load->view('dashboard', $param);
	}

	public function verif($id){
		$cek = $this->Mabsen->verifAbsen($id);
		if($cek > 0){
			$this->session->set_flashdata('success_message', 'Data rekap berhasil diverifikasi');
			redirect('Absen');
		}else{
			$this->session->set_flashdata('error_message', 'Data rekap gagal diverifikasi');
			redirect('Absen');
		}
	}

	public function det_absen($id){
		$param['main_content'] = 'absen/detail';
		$param['page_title'] = 'Detail Absensi';
		$param['detail_list'] = $this->Mabsen->getAbsen($id);
		$param['detail_note'] = $this->Mabsen->getNote($id);
		$this->load->view('dashboard', $param);
	}

	public function delete($id){
		$this->Mabsen->delete($id);
		$this->session->set_flashdata('success_message', 'Data dosen berhasil dihapus');
		redirect('Dosen');
	}
}