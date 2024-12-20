<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Bookmark
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Bookmark extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 'peminjam') {
			# code...
			redirect('error/NotFound');
		}
		$this->load->model('Bookmark_model', 'bmm');

	}

	public function index()
	{
		# code...
		$user_id = $this->session->userdata('UserID');
		$data['viewDataCountBookmark'] = $this->bmm->count_user_bookmarks($user_id);
		$data['viewDataBookmark'] = $this->bmm->viewDataBookmark($user_id);
		$data['titlePage'] = 'Bookmark';
		$this->template->load('template', 'Pages/public/bookmark', $data);
	}

	public function delete($id)
	{
		# code...
		$this->bmm->deleteBookmark($id);
		$this->session->set_flashdata('success', 'The book has been removed from the bookmark list!!');
		redirect($_SERVER['HTTP_REFERER']);
	}

}


/* End of file Bookmark.php */
/* Location: ./application/controllers/Bookmark.php */
