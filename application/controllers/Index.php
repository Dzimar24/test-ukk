<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model', 'index');
		$this->load->helper('Popover');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$user_id = $this->session->userdata('UserID');
		$data['viewDataCountBookmark'] = $this->index->count_user_bookmarks($user_id);
		$data['viewDataBook'] = $this->index->viewDataBook();
		$data['dataBookmark'] = $this->index->dataBookmark();
		$this->template->load('template', 'Pages/public/index', $data);
	}

	public function addBookmark($idBook)
	{
		# code...
		$idUser = $this->session->userdata('UserID');
		$this->index->addBookmark($idBook, $idUser);
		//? Redirect ke halaman utama plus Alert
		$this->session->set_flashdata('success', 'The book has been successfully saved to bookmarks');
		redirect('Index');
	}

	public function Borrowing()
	{
		$idUser = $this->session->userdata('UserID');
		$idBook = $this->input->post('id');
		$dateStart = $this->input->post('startBorrowing');
		$dateEnd = $this->input->post('endBorrowing');

		if (empty($dateStart) || empty($dateEnd)) {
			# code...
			$this->session->set_flashdata('error', 'Please fill in the borrowing date');
			redirect('Index');
		} else {
			//? Mulai transaksi database
			$this->db->trans_start();

			//? Data peminjaman utama
			$borrowing_data = [
				'tanggal_pinjam' => $dateStart,
				'tanggal_kembali' => $dateEnd,
				'user_id' => $idUser,
				'status' => 'pending'
			];

			//! Insert ke tabel peminjaman
			$this->db->insert('peminjaman', $borrowing_data);
			$peminjaman_id = $this->db->insert_id();

			//! Insert detail peminjaman
			$data = [
				'peminjaman_id' => $peminjaman_id,
				'buku_id' => $idBook,
			];
			$this->db->insert('peminjaman_detail', $data);

			//! Commit transaksi
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$this->session->set_flashdata('error', 'Failed to borrow book. Please try again.');
				redirect('Index');
			}

			$this->session->set_flashdata('success', 'The book has been successfully borrowed');
			redirect('Index');
		}
	}

	public function fullPageBook($idBook)
	{
		$idUser = $this->session->userdata('UserID');
		$data['viewDataCountBookmark'] = $this->index->count_user_bookmarks($idUser);
		$data['viewDataReview'] = $this->index->dataReview($idBook);
		$data['viewDataReviewUser'] = $this->index->dataReviewUser();
		$data['viewFullDataBook'] = $this->index->viewFullDataBook($idBook);

		$this->template->load('template', 'Pages/public/fullPageBook', $data);
	}

	public function Review()
	{
		$rating = $this->input->post('rating');
		$comment = $this->input->post('rating');
		$idBook = $this->input->post('idBook');

		if (empty($rating) || empty($comment) || empty($idBook)) {
			$this->session->set_flashdata('error', 'Please fill in the rating and comment');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data = [
			'Rating' => $rating,
			'Ulasan' => $comment,
			'BukuID' => $idBook,
			'UserID' => $this->session->userdata('UserID'),
		];

		$this->index->create($data);

		$this->session->set_flashdata('success', 'The book has been successfully reviewed');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function EditReview() {
		$idReview = $this->input->post('idReview');
		
		if (empty($idReview)) {
			$this->session->set_flashdata('error', 'Error updating review. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$comment = $this->input->post('commentUpdate');
		$rating = $this->input->post('ratingUpdate');

		if (empty($comment) || empty($rating)) {
			$this->session->set_flashdata('error', 'Please fill in the rating and comment');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data = [
			'Ulasan' => $comment,
			'Rating'	=> $rating
		];

		$this->index->update($idReview, $data);

		$this->session->set_flashdata('success', 'The review has been successfully updated');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function DeleteReview($idReview) {
		if (empty($idReview)) {
			$this->session->set_flashdata('error', 'Please fill in the rating and comment');
			redirect($_SERVER['HTTP_REFERER']);
		}

		try {
			$this->index->delete($idReview);
			$this->session->set_flashdata('success', 'The review has been successfully deleted');
			redirect($_SERVER['HTTP_REFERER']);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', 'Failed to delete review. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
