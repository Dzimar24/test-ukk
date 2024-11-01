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
		// header('Content-Type: application/json');
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
		$data['titleTableName'] = 'List Borrowing Book';
		$data['viewDataBook'] = $this->bm->viewDataBook();
		$data['viewDataCountBookmark'] = $this->bm->count_user_bookmarks($user_id);
		$data['viewDataBorrowingTemp'] = $this->bm->viewDataBorrowingInTemporary();
		$this->template->load('template', 'Pages/public/addBorrowingPage', $data);
	}

	public function BorrowingBook()
	{
		$idUser = $this->session->userdata('UserID');
		$idBook = $this->input->post('buku');

		if (empty($idBook) || !is_array($idBook) || count($idBook) < 1) {
			$response = [
				'status' => 'error',
				'message' => 'Please select a book to borrow',
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
					'data' => $updatedData,
				];
			} else {
				$response = [
					'status' => 'error',
					'message' => 'Failed to borrow books. Please try again.',
				];
			}
		}

		// Kirim respons JSON
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function BookBorrowing()
	{
		//? Pastikan request adalah POST
		if ($this->input->server('REQUEST_METHOD') !== 'POST') {
			$response = [
				'success' => false,
				'message' => 'Invalid request method'
			];
			echo json_encode($response);
			return;
		}

		try {
			//? Ambil raw input data
			$json = file_get_contents('php://input');
			$data = json_decode($json, true);

			// Debug: cek data yang diterima
			log_message('debug', 'Received data: ' . print_r($data, true));

			//? Validasi data
			if (!isset($data['tanggal_pinjam']) || !isset($data['tanggal_kembali']) || !isset($data['books'])) {
				throw new Exception('Data tidak lengkap');
			}

			//? Mulai transaksi database
			$this->db->trans_start();

			//? Data peminjaman utama
			$borrowing_data = [
				'tanggal_pinjam' => $data['tanggal_pinjam'],
				'tanggal_kembali' => $data['tanggal_kembali'],
				'user_id' => $this->session->userdata('UserID'), // Sesuaikan dengan session Anda
				'status' => 'pending'
			];

			//! Insert ke tabel peminjaman
			$this->db->insert('peminjaman', $borrowing_data);
			$peminjaman_id = $this->db->insert_id();

			//! Insert detail peminjaman
			foreach ($data['books'] as $book) {
				$detail_data = [
					'peminjaman_id' => $peminjaman_id,
					'buku_id' => $book['bukuId'],
					'status' => 'pending'
				];
				$this->db->insert('peminjaman_detail', $detail_data);
			}

			//! Hapus data dari temporary borrowing
			$userId = $this->session->userdata('UserID');
			$this->db->where('idUser', $userId);
			$this->db->delete('temporaryborrowing');

			//? Commit transaksi
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				throw new Exception('Gagal menyimpan data peminjaman');
			}

			$response = [
				'success' => true,
				'message' => 'Peminjaman buku berhasil diproses'
			];

			echo json_encode($response);
		} catch (Exception $e) {
			//? Rollback transaksi jika ada
			if ($this->db->trans_status() !== FALSE) {
				$this->db->trans_rollback();
			}

			$response = [
				'success' => false,
				'message' => 'Gagal memproses peminjaman: ' . $e->getMessage()
			];

			echo json_encode($response);
		}
	}

	public function deleteTemp($id)
	{
		# code...
		$this->bm->deleteTemporaryBorrowing($id);
		$this->session->set_flashdata('success', 'The book has been removed from the Temporary borrowing list!!');
		redirect('Public/Borrowing/addBorrowing');
	}
}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
