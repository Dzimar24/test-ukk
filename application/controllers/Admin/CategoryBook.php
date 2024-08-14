<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller CategoryBook
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

class CategoryBook extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model('Category_model', 'category');
  }

  public function index()
  {
    //

		$data['titlePage'] = 'Category Book';
		$data['viewData'] = $this->category->viewDataCategory();
		$this->template->load('template', 'Pages/admin/categoryBook', $data);
  }

	public function add()
	{
		# code...
		show_source('application/controllers/Admin/CategoryBook.php');
	}

}


/* End of file CategoryBook.php */
/* Location: ./application/controllers/CategoryBook.php */
