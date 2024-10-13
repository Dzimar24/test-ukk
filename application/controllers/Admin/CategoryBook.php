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
 * @author    Muchamad Dzimar Ramadhan <ramadzimar@gmail.com>
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
		$this->load->library('encryption');
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
			$data['parameter'] = 'updatePage';
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
		//? Get ID Category
		$id = $this->input->post('id');

		//? Get Data via ID Catagory
		$dataCategory = $this->category->get_category_by_id($id);

		$newNameCategory = $this->input->post('nameCategoryUpdate');

		//? validasi form
		$this->form_validation->set_rules('nameCategoryUpdate', 'Category', 'trim');

		//? Hanya validasi unik jika username berubah
		if ($newNameCategory != $dataCategory) {
			$this->form_validation->set_rules('nameCategoryUpdate', 'Category', 'trim|is_unique[kategori.NamaKategori]');
		}

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->session->set_flashdata('error', 'Error Bro !!');
			//? Page will be thrown into Category book page
			$data['titlePage'] = 'Category Book';
			$data['parameter'] = 'updatePage';
			$data['editData'] = $this->category->viewDataEditCategory($id);
			$data['viewData'] = $this->category->viewDataCategory();
			$this->template->load('template', 'Pages/admin/categoryBook', $data);
		} else {
			# code...
			$post = $this->input->post('nameCategoryUpdate');
			$this->category->editData($post, $id);
			$this->session->set_flashdata('success', 'Success Bro !!');
			//? Page will be thrown into Category book page
			$data['titlePage'] = 'Category Book';
			$data['parameter'] = '';
			$data['editData'] = $this->category->viewDataEditCategory($id);
			$data['viewData'] = $this->category->viewDataCategory();
			$this->template->load('template', 'Pages/admin/categoryBook', $data);
		}
		// $this->session->set_flashdata('success', 'Success Bro !!');
		// redirect('Admin/CategoryBook');
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
