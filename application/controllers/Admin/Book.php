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
		// $data = [
		// 	$this->input->post(null, true),
		// ];
		// var_dump($data); die;
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

}


/* End of file Book.php */
/* Location: ./application/controllers/Book.php */
