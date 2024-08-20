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
  }

  public function index()
  {
		$data['parameter'] = '';
		$data['titlePage'] = 'Book';
    $this->template->load('template', 'Pages/admin/book', $data);
  }

	

}


/* End of file Book.php */
/* Location: ./application/controllers/Book.php */
