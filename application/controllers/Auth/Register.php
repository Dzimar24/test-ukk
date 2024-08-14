<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model', 'auth');
	}

	public function index()
	{
		# code...
		$this->load->view('Pages/auth/register.php');
	}

	public function process()
	{
		//? Mengatur aturan validasi form
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.Username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('namaLengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Error Jhon !!');
			$this->load->view('Pages/Auth/Register');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->auth->insertData($post);
			$this->session->set_flashdata('success', 'User Successfully Added and Ready to Login');
			
			$this->load->view('Pages/Auth/Login');
		}
	}
}
