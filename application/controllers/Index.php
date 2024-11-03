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
		$user_id = $this->session->userdata('UserID');
		$data['viewDataCountBookmark'] = $this->index->count_user_bookmarks($user_id);
		$data['checkUserExists'] = $this->index->check_existing_borrow();
		$data['viewDataBook'] = $this->index->viewDataBook();
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

	public function fullPageBook($idBook)
	{
		$idUser = $this->session->userdata('UserID');
		$data['viewDataCountBookmark'] = $this->index->count_user_bookmarks($idUser);
		$data['viewFullDataBook'] = $this->index->viewFullDataBook($idBook);

		$this->template->load('template', 'Pages/public/fullPageBook', $data);
	}
}
