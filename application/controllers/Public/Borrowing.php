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

}


/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
