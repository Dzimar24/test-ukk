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
		$data['parameter'] = '';
		$data['titlePage'] = 'Category Book';
		$data['viewData'] = $this->category->viewDataCategory();
		$this->template->load('template', 'Pages/admin/categoryBook', $data);
	}

	public function add()
	{
		# code...
		$this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[kategori.NamaKategori]');
		
		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->session->set_flashdata('error', 'Error Bro !!');
			//? Page will be thrown into Category book page
			$data['titlePage'] = 'Category Book';
			$data['parameter'] = '';
			$data['viewData'] = $this->category->viewDataCategory();
			$this->template->load('template', 'Pages/admin/categoryBook', $data);
		} else {
			# code...
			$post = $this->input->post(null, TRUE);
			$this->category->add($post);
			$this->session->set_flashdata('success', 'Success Bro !!');
			//? Page will be thrown into Category book page
			$data['titlePage'] = 'Category Book';
			$data['parameter'] = '';
			$data['viewData'] = $this->category->viewDataCategory();
			$this->template->load('template', 'Pages/admin/categoryBook', $data);
		}
	}

	public function edit($id){
		# code...
		$data['parameter'] = 'updatePage';
		$data['titlePage'] = 'Category Book';
		$data['editData'] = $this->category->viewDataEditCategory($id);
		$data['viewData'] = $this->category->viewDataCategory();

		$this->template->load('template', 'Pages/admin/categoryBook', $data);
	}

	public function Update(){
		$nameCategory = $this->input->post('nameCategoryUpdate');
		$this->category->editData($nameCategory);
		$this->session->set_flashdata('success', 'Success Bro !!');
		redirect('Admin/CategoryBook');
	}

	public function deleted($id)
	{
		# code...
		$this->category->deleteData($id);
		$this->session->set_flashdata('success', 'Success Deleted Data Category Book !!');
		redirect('Admin/CategoryBook');
	}

}


/* End of file CategoryBook.php */
/* Location: ./application/controllers/CategoryBook.php */
