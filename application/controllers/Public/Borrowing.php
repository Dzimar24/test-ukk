<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Peminjaman
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Muchamad Dzimar Ramadhan <ramadzimar@gmail.com>
 * @author    ...
 * @link      ...
 * @param     ...
 * @return    ...
 *
 */

class Borrowing extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 'peminjam') {
			# code...
			redirect('error/NotFound');
		}
		$this->load->model('Borrowing_model', 'bm');
		$this->load->helper('text');
	}

	public function index()
	{
		// 
		$user_id = $this->session->userdata('UserID');

		$data['titlePage'] = 'Borrowing Page';
		$data['viewDataCountBookmark'] = $this->bm->count_user_bookmarks($user_id);
		$data['viewDataBorrowing'] = $this->bm->viewDataBorrowing();
		$this->template->load('template', 'Pages/public/borrowingData', $data);
	}

	public function addBorrowing()
	{
		$user_id = $this->session->userdata('UserID');

		$data['titlePage'] = 'Borrowing Add Book Page';
		$data['titleTableName'] = 'Table Borrowing Add';
		$data['viewDataBook'] = $this->bm->viewDataBook();
		$data['viewDataCountBookmark'] = $this->bm->count_user_bookmarks($user_id);
		$data['viewDataBorrowingTemp'] = $this->bm->viewDataBorrowingInTemporary();
		$this->template->load('template', 'Pages/public/addBorrowingPage', $data);
	}

	public function BorrowingBookL()
	{
		# code...
		// date_default_timezone_set('Asia/Jakarta');

		// //? Ambil data dari input & session
		// $idUser = $this->session->userdata('UserID');
		// $idBook = $this->input->get('buku');
		// // $startBorrowing = $this->input->post('startBorrowing'); // Format: YYYY-MM-DD
		// // $endBorrowing = $this->input->post('endBorrowing');     // Format: YYYY-MM-DD

		// if (empty($idBook) || is_array($idBook) == FALSE || count($idBook) < 1) {
		// 	# code...
		// 	$this->session->set_flashdata('error', 'Please select a book to borrow');
		// 	redirect('Public/Borrowing/addBorrowing');
		// }

		// //? Tambahkan waktu default ke tanggal startBorrowing
		// // $startBorrowingWithTime = $startBorrowing . ' ' . date('H:i:s'); // YYYY-MM-DD H:i:s
		// // $endBorrowingWithTime = $endBorrowing . ' ' . date('H:i:s'); // YYYY-MM-DD H:i:s

		// //? Tambahkan data ke database
		// $this->bm->addBorrowing($idUser, $idBook);

		// //? Redirect ke halaman utama plus Alert
		// redirect('Public/Borrowing/addBorrowing');
		date_default_timezone_set('Asia/Jakarta');

		//? Ambil data dari input & session
		$idUser = $this->session->userdata('UserID');
		$idBook = $this->input->post('buku'); // Menggunakan POST untuk menerima data array

		if (empty($idBook) || !is_array($idBook) || count($idBook) < 1) {
			// Jika tidak ada buku yang dipilih atau data tidak valid
			$this->session->set_flashdata('error', 'Please select a book to borrow');
			redirect('Public/Borrowing/addBorrowing');
		}

		//? Tambahkan data ke database (sesuaikan dengan model Anda)
		$this->bm->addBorrowing($idUser, $idBook);

		//? Redirect ke halaman utama plus Alert sukses
		$this->session->set_flashdata('success', 'Books have been successfully borrowed');
		redirect('Public/Borrowing/addBorrowing');
	}

	public function BorrowingBook()
	{
		$idUser = $this->session->userdata('UserID');
		$idBook = $this->input->post('buku');

		if (empty($idBook) || !is_array($idBook) || count($idBook) < 1) {
			$response = [
				'status' => 'error',
				'message' => 'Please select a book to borrow'
			];
		} else {
			// Tambahkan data ke database
			$result = $this->bm->addBorrowing($idUser, $idBook);

			if ($result) {
				// Jika berhasil, ambil data terbaru untuk tabel utama
				$updatedData = $this->bm->getUpdatedBorrowingData($idUser);

				$response = [
					'status' => 'success',
					'message' => 'Books have been successfully borrowed',
					'data' => $updatedData
				];
			} else {
				$response = [
					'status' => 'error',
					'message' => 'Failed to borrow books. Please try again.'
				];
			}
		}

		// Kirim respons JSON
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
}


/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
