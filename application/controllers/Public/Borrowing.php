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
	}

	public function index()
	{
		// 
		$this->template->load('template', 'Pages/public/borrowingData');
	}

}


/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
