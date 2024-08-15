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
		$this->load->library('form_validation');
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
		$this->form_validation->set_rules('name', 'Name', 'trim|required|unique[kategori.NamaKategori]');
		
		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->session->set_flashdata('error', 'Error Bro !!');
			$data['titlePage'] = 'Category Book';
			$this->template->load('template', 'Pages/admin/categoryBook', $data);
		} else {
			# code...
			$post = $this->input->post(null, TRUE);
			$this->category->add($post);
			$this->session->set_flashdata('success', 'Success Bro !!');
			$this->template->load('template', 'Pages/admin/categoryBook', $data);
		}
		
		
	}

}


/* End of file CategoryBook.php */
/* Location: ./application/controllers/CategoryBook.php */
