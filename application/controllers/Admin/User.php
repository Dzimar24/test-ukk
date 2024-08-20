<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller User
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller USER
 * @author    Muchamad Dzimar Ramadhan <ramadzimar@gmail.com>
 * @link      ...
 * @param     ...
 * @return    ...
 *
 */

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		// 
		$data['parameter'] = '';
		$data['titlePage'] = 'User';
		$data['viewData'] = $this->user->viewDataUser();
		$this->template->load('template', 'Pages/admin/user', $data);
	}

	public function add()
	{
		//? Mengatur aturan validasi form
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.Username]');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Error Bro !!');
			//! File view User  
			$data['titlePage'] = 'User';
			$data['viewData'] = $this->user->viewDataUser();
			$this->template->load('template', 'Pages/admin/user', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user->AddUser($post);
			$this->session->set_flashdata('success', 'User Successfully Added');
			//! File view User  
			$data['titlePage'] = 'User';
			$data['viewData'] = $this->user->viewDataUser();
			$this->template->load('template', 'Pages/admin/user', $data);
		}
	}

	public function edit($id)
	{
		# code...
		$data['parameter'] = 'updateUserPage';
		$data['titlePage'] = 'User';
		$data['viewDataLevel'] = $this->user->viewDataLevel($id);
		$data['viewDataEdit'] = $this->user->viewDataEditUser($id);
		$data['viewData'] = $this->user->viewDataUser();
		$this->template->load('template', 'Pages/admin/user', $data);
	}

	public function updateData($id)
	{
		//? Ambil data user berdasarkan ID
		$dataUser = $this->user->get_user_by_id($id);
		$dataUsername = $dataUser->Username;

		//? Ambil input baru dari form
		$newUsername = $this->input->post('usernameUpdate');

		// Mengatur aturan validasi form
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('usernameUpdate', 'Username', 'trim');

		//? Hanya validasi unik jika username berubah
		if ($newUsername != $dataUsername) {
			$this->form_validation->set_rules('usernameUpdate', 'Username', 'trim|is_unique[user.Username]');
		}

		$this->form_validation->set_rules('level', 'Level', 'trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');

		//! Jalankan validasi form
		if ($this->form_validation->run() == FALSE) {
			//! Validasi gagal, kembalikan ke form dengan error
			$this->session->set_flashdata('error', 'Error Bro !!');

			$data['parameter'] = 'updateUserPage';
			$data['titlePage'] = 'User';
			$data['viewDataLevel'] = $this->user->viewDataLevel($id);
			$data['viewDataEdit'] = $this->user->viewDataEditUser($id);
			$data['viewData'] = $this->user->viewDataUser();

			//? Load view dengan template
			$this->template->load('template', 'Pages/admin/user', $data);
		} else {
			//! Validasi sukses, update data di database
			$post = $this->input->post(null, TRUE);
			$this->user->updateUser($post, $id);

			//? Set pesan sukses dan redirect ke halaman user
			$this->session->set_flashdata('success', 'User Successfully Updated');

			$data['parameter'] = '';
			$data['titlePage'] = 'User';
			$data['viewData'] = $this->user->viewDataUser();

			$this->template->load('template', 'Pages/admin/user', $data);
		}
	}


}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
