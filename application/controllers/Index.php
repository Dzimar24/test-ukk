<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model', 'index');
		$this->load->helper('Popover');
	}

	public function index()
	{
		$data['viewDataBook'] = $this->index->viewDataBook();
		$this->template->load('template', 'Pages/public/index', $data);
	}

	public function Borrowing()
	{
		# code...
		date_default_timezone_set('Asia/Jakarta');

		//? Ambil data dari input & session
		$idUser = $this->session->userdata('UserID');
		$idBook = $this->input->post('id');
		$startBorrowing = $this->input->post('startBorrowing'); // Format: YYYY-MM-DD
		$endBorrowing = $this->input->post('endBorrowing');     // Format: YYYY-MM-DD

		//? Tambahkan waktu default ke tanggal startBorrowing
		$startBorrowingWithTime = $startBorrowing . ' ' . date('H:i:s'); // YYYY-MM-DD H:i:s
		$endBorrowingWithTime = $endBorrowing . ' ' . date('H:i:s'); // YYYY-MM-DD H:i:s

		//? Tambahkan data ke database
		$this->index->addBorrowing($idUser, $idBook, $startBorrowingWithTime, $endBorrowingWithTime);

		//? Redirect ke halaman utama plus Alert
		$this->session->set_flashdata('success', 'Successfully Borrowing Book !!');
		redirect('Index');
	}

}
