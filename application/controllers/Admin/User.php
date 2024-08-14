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
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
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
			$data['titlePage'] = 'User';
			$this->template->load('template', 'Pages/admin/user', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user->AddUser($post);
			$this->session->set_flashdata('success', 'User Successfully Added');
			$data['titlePage'] = 'User';
			$this->template->load('template', 'Pages/admin/user', $data);
		}
	}

}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
