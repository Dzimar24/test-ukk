<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Book
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Muchamad Dzimar Ramadhan <ramadzimar@gmail.com>
 * @link      ...
 * @param     ...
 * @return    ...
 *
 */

class Book extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Book_model', 'book');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['parameter'] = '';
		$data['titlePage'] = 'Book';
		$data['viewDataCategory'] = $this->book->viewDataCategoryBook();
		$data['viewDataBook'] = $this->book->viewDataBook();
		$this->template->load('template', 'Pages/admin/book', $data);
	}

	public function Add()
	{
		//? Aturan validasi
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('categoryBook', 'Category', 'trim|required');
		$this->form_validation->set_rules('author', 'Author', 'trim|required');
		$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
		$this->form_validation->set_rules('publication_year', 'Publication Year', 'trim|required');
		$this->form_validation->set_rules('description', 'Book Description', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			//! Validasi gagal, tampilkan error flashdata
			$this->session->set_flashdata('error', validation_errors());
			//! Redirect ke halaman form
			//? View to 
			$data['parameter'] = '';
			$data['titlePage'] = 'Book';
			$data['viewDataCategory'] = $this->book->viewDataCategoryBook();
			$data['viewDataBook'] = $this->book->viewDataBook();
			$this->template->load('template', 'Pages/admin/book', $data);
		} else {
			//? Konfigurasi upload file
			$config['upload_path'] = './assets/uploads/coverBook/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; //? Maksimal ukuran 2MB
			$config['file_name'] = time() . '_cover_book'; //? Nama file unik

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('cover')) {
				//? Upload gambar gagal, tampilkan pesan error
				$this->session->set_flashdata('error', $this->upload->display_errors());
				//? View to 
				$data['parameter'] = '';
				$data['titlePage'] = 'Book';
				$data['viewDataCategory'] = $this->book->viewDataCategoryBook();
				$data['viewDataBook'] = $this->book->viewDataBook();
				$this->template->load('template', 'Pages/admin/book', $data);
			} else {
				//? Upload berhasil, simpan data buku
				$uploadData = $this->upload->data();
				$cover_image = $uploadData['file_name'];

				//? Data untuk disimpan
				$data = [
					'Judul' => $this->input->post('title'),
					'idKategory' => $this->input->post('categoryBook'),
					'Penulis' => $this->input->post('author'),
					'Penerbit' => $this->input->post('publisher'),
					'TahunTerbit' => $this->input->post('publication_year'),
					'deskripsi' => $this->input->post('description'),
					'coverBook' => $cover_image
				];

				//? Simpan ke database
				if ($this->book->addDataBook($data)) {
					//? Proses berhasil, tampilkan pesan sukses
					$this->session->set_flashdata('success', 'Book added successfully.');
					// ? View to 
					$data['parameter'] = '';
					$data['titlePage'] = 'Book';
					$data['viewDataCategory'] = $this->book->viewDataCategoryBook();
					$data['viewDataBook'] = $this->book->viewDataBook();
					$this->template->load('template', 'Pages/admin/book', $data);
				} else {
					//? Simpan data gagal, tampilkan pesan error
					$this->session->set_flashdata('error', 'Failed to add book, try again.');
					//? View to 
					$data['parameter'] = '';
					$data['titlePage'] = 'Book';
					$data['viewDataCategory'] = $this->book->viewDataCategoryBook();
					$data['viewDataBook'] = $this->book->viewDataBook();
					$this->template->load('template', 'Pages/admin/book', $data);
				}
			}
		}
	}

	public function edit($id)
	{
		# code...
		$data['parameter'] = 'updatePage';
		$data['titlePage'] = 'Book';
		$data['viewDataEdit'] = $this->book->viewDataEditBook($id);
		$data['viewDataCategory'] = $this->book->viewDataCategoryBook();
		$data['viewDataBook'] = $this->book->viewDataBook();
		$this->template->load('template', 'Pages/admin/book', $data);
	}

	public function UpdateBook()
	{
		$id = $this->input->post('id');

		// Aturan validasi
		$this->form_validation->set_rules('titleUpdate', 'Title', 'trim|required');
		$this->form_validation->set_rules('categoryBookUpdate', 'Category', 'trim|required');
		$this->form_validation->set_rules('authorUpdate', 'Author', 'trim|required');
		$this->form_validation->set_rules('publisherUpdate', 'Publisher', 'trim|required');
		$this->form_validation->set_rules('publication_year_update', 'Publication Year', 'trim|required');
		$this->form_validation->set_rules('descriptionUpdate', 'Description', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			$this->redirectToUpdatePage($id);
		} else {
			$data = [
				'Judul' => $this->input->post('titleUpdate'),
				'idKategory' => $this->input->post('categoryBookUpdate'),
				'Penulis' => $this->input->post('authorUpdate'),
				'Penerbit' => $this->input->post('publisherUpdate'),
				'TahunTerbit' => $this->input->post('publication_year_update'),
				'deskripsi' => $this->input->post('descriptionUpdate')
			];

			$old_cover = $this->book->getOldCover($id);

			if ($_FILES['coverBookNew']['size'] > 0) {
				$config['upload_path'] = './assets/uploads/coverBook/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = time() . '_cover_book';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('coverBookNew')) {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					$this->redirectToUpdatePage($id);
					return;
				}

				$uploadData = $this->upload->data();
				$data['coverBook'] = $uploadData['file_name'];

				// Hapus cover lama
				if ($old_cover && file_exists('./assets/uploads/coverBook/' . $old_cover)) {
					unlink('./assets/uploads/coverBook/' . $old_cover);
				}
			}

			if ($this->book->updateDataBook($id, $data)) {
				$this->session->set_flashdata('success', 'Book updated successfully.');
				redirect('admin/book');
			} else {
				$this->session->set_flashdata('error', 'Failed to update book, please try again.');
				$this->redirectToUpdatePage($id);
			}
		}
	}

	private function redirectToUpdatePage($id)
	{
		$data['parameter'] = 'updatePage';
		$data['titlePage'] = 'Update Book';
		$data['viewDataEdit'] = $this->book->viewDataEditBook($id);
		$data['viewDataCategory'] = $this->book->viewDataCategoryBook();
		$data['viewDataBook'] = $this->book->viewDataBook();
		$this->template->load('template', 'Pages/admin/book', $data);
	}

	public function delete($id)
	{
		//? Periksa apakah ID valid
		if (!$id) {
			$this->session->set_flashdata('error', 'Invalid book ID.');
			redirect('admin/book');
		}

		//? Ambil informasi buku sebelum dihapus
		$book = $this->book->getBookById($id);

		if (!$book) {
			$this->session->set_flashdata('error', 'Book not found.');
			redirect('admin/book');
		}

		// Hapus buku dari database
		if ($this->book->deleteBook($id)) {
			// Jika penghapusan dari database berhasil, hapus file cover
			if ($book->coverBook && file_exists('./assets/uploads/coverBook/' . $book->coverBook)) {
				unlink('./assets/uploads/coverBook/' . $book->coverBook);
			}

			$this->session->set_flashdata('success', 'Book deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete book. Please try again.');
		}

		redirect('admin/book');
	}

}


/* End of file Book.php */
/* Location: ./application/controllers/Book.php */
